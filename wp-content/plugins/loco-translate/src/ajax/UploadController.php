<?php
/**
 * Ajax "upload" route, for putting translation files to the server
 */
class Loco_ajax_UploadController extends Loco_ajax_common_BundleController {

    /**
     * {@inheritdoc}
     */
    public function render(){
        $post = $this->validate();
        $href = $this->process( $post );
        //
        $this->set('redirect',$href);
        return parent::render();
    }


    /**
     * Upload processor shared with standard postback controller
     * @param Loco_mvc_ViewParams script input
     * @return string redirect to file edit
     */
    public function process( Loco_mvc_ViewParams $post ){
        $bundle = $this->getBundle();
        $project = $this->getProject( $bundle );
        // Chosen folder location should be valid as a posted "dir" parameter
        if( ! $post->has('dir') ){
            throw new Loco_error_Exception('No destination posted');
        }
        $base = loco_constant('WP_CONTENT_DIR');
        $parent = new Loco_fs_Directory($post->dir);
        $parent->normalize($base);
        // Loco_error_AdminNotices::debug('Destination set to '.$parent->getPath() );
        // Ensure file uploaded ok
        if( ! isset($_FILES['f']) ){
            throw new Loco_error_Exception('No file posted');
        }
        $upload = new Loco_data_Upload($_FILES['f']);
        $dummy = new Loco_fs_DummyFile( $upload->getName() );
        $ext = strtolower( $dummy->extension() );
        // Loco_error_AdminNotices::debug('Have uploaded file: '.$dummy->basename() );
        switch($ext){
            case 'po':
            case 'mo':
                $dummy->putContents($upload->getContents());
                $pomo = Loco_gettext_Data::load($dummy);
                break;
            default:
                throw new Loco_error_Exception('Only PO/MO uploads supported');
        }
        // PO/MO data is valid.
        // get real file name and establish if a locale can be extracted, otherwise get from headers
        $file = new Loco_fs_LocaleFile( $dummy->basename() );
        $locale = $file->getLocale();
        if( ! $locale->isValid() ){
            $value = $pomo->getHeaders()->offsetGet('Language');
            $locale = Loco_Locale::parse($value);
            if( ! $locale->isValid() ){
                throw new Loco_error_Exception('Unable to detect language from '.$file->basename() );
            }
        }
        // Fail if user presents ?? wrongly named file. This is to avoid mixing up text domains.
        $pofile = $project->initLocaleFile($parent,$locale);
        if( $pofile->filename() !== $dummy->filename() ){
            throw new Loco_error_Exception( sprintf('File must be named %s', $pofile->filename().'.'.$ext ) );
        }
        $api = new Loco_api_WordPressFileSystem;
        // PO may exist already. If not we need to auth create instead of update
        if( $pofile->exists() ){
            if( 'po' === $ext && $pofile->md5() === $dummy->md5() ){
                throw new Loco_error_Exception( __('Your file is identical to the existing one','loco-translate') );
            }
            // backup existing PO file before overwriting, but proceed on failure
            $backups = new Loco_fs_Revisions($pofile);
            $backups->rotate($api);
            $api->authorizeUpdate($pofile);
        }
        else {
            $api->authorizeCreate( $pofile );
        }
        // Putting file contents, because remote file system may not be able to read from tmp/upload location
        if( 'mo' === $ext ){
            $pofile->putContents( $pomo->msgcat() );
            $bin = $dummy->getContents(); // <- use binary as-is.
        }
        else {
            $pofile->putContents( $dummy->getContents() ); // <- use po source as is
            $bin = $pomo->msgfmt(); // <- compile binary from PO
        }
        // should have binary data unless something went wrong
        if( $bin ){
            $mofile = $pofile->cloneExtension('mo');
            $mofile->exists() ? $api->authorizeUpdate($mofile) : $api->authorizeCreate($mofile);
            $mofile->putContents($bin);
        }
        // Redirect to edit this PO. Sync may be required and we're not doing automatically here.
        $type = strtolower( $this->get('type') );
        return Loco_mvc_AdminRouter::generate( sprintf('%s-file-edit',$type), array(
            'path' => $pofile->getRelativePath($base),
            'bundle' => $bundle->getHandle(),
            'domain' => $project->getId(),
        ) );
    }
}