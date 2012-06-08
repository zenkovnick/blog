<?php
class PluginBackendPhotosForm extends PluginPhotosForm {
    public function configure() {
        parent::configure();

        $this->removeFields();
        $this->widgetSchema->setLabels(array(
                'title' => 'Titre :',
                'gallery_id' => 'Galerie :',
        ));
//        $this->widgetSchema['picpath'] = new sfWidgetFormInputFile(array('label' => 'Image'));
        $this->widgetSchema['picpath'] = new sfWidgetFormInputFileEditable(array(
                        'label'     => 'Image :',
                        'file_src'  => '/uploads/thumbnail/150_'.$this->getObject()->getPicpath(),
                        'is_image'  => true,
                        'edit_mode' => !$this->isNew(),
                        'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
        ));

        $this->validatorSchema['picpath'] = new sfValidatorFile(array(
                        'required'   => false,
                        'path'       => 'uploads'
                        
                ));
        $this->disableCSRFProtection();

        $this->validatorSchema['logo_delete'] = new sfValidatorPass();
    }
    protected function removeFields() {
        unset($this['created_at'], $this['updated_at'], $this['slug'], $this['is_default']);
    }

    public function generatePicpathFilename(sfValidatedFile $file) {
        return $file->getOriginalName();
    }
}
?>
