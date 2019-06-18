<?php
class School_OnlineGaming_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup
{
    public function getDefaultEntities()
    {
        $entities = array(
            'school_onlinegaming_eavgames' => array(
                'entity_model' => 'school_onlinegaming/eavgames',
                'attribute_model' => '',
                'table' => 'school_onlinegaming/eavgames_entity',
                'attributes' => array(
                    'title' => array(
                        'type' => 'varchar',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Title',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => true,
                        'unique' => false,
                    ),
                    'author' => array(
                        'type' => 'varchar',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Author',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => false,
                        'unique' => false,
                    ),
                ),
            )
        );
        return $entities;
    }
}
