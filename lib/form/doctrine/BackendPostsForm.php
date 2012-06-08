<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zennick
 * Date: 05.04.12
 * Time: 16:49
 * To change this template use File | Settings | File Templates.
 */
class BackendPostsForm extends PostsForm
{
    public function configure(){
        parent::configure();

        $this->widgetSchema['thumb'] = new sfWidgetFormInputFileEditable(array(
            'label'     => 'Миниатюра',
            'file_src'  => '/images/'.$this->getObject()->getThumb(),
            'is_image'  => true,
            'edit_mode' => !$this->isNew(),
            'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
        ));

        $this->validatorSchema['thumb_delete'] = new sfValidatorPass();

        $this->validatorSchema['thumb'] = new sfValidatorFile(array(
            'mime_types' => 'web_images',
            'path' => sfConfig::get('sf_upload_dir').'/../images/',
            'required' => false));
    }

}
