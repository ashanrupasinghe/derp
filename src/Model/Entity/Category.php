<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Category Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $status
 * @property int $parent_id
 *
 * @property \App\Model\Entity\ParentCategory $parent_category
 * @property \App\Model\Entity\ChildCategory[] $child_categories
 * @property \App\Model\Entity\Product[] $products
 */
class Category extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    
    protected $_virtual = ['has_sub_category'];
    protected function _getHasSubCategory()
    {
    	
    	$categories=TableRegistry::get('Categories');
    	$q=$categories->find('all',['conditions'=>['parent_id'=>$this->_properties['id'],'status'=>1]]);
    	$count=$q->count();
    	if ($count>0){
    		return true;
    	}
    	return false;
    }
    
    
}