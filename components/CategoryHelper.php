<?php
namespace app\components;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Session;
use app\models\Categories;
/**

**/
class CategoryHelper
{
    /* 獲取旗下所有 */
    function getTreeList($name=null, $selectMode= true){
        $categories =  Categories::getTreeList($name);
        if($selectMode){
            if($categories){
                $newCategories = array();
                $level = 0;
                foreach($categories as $category){
                    $children = $category['children'];
                    unset($category['children']);
                    $newCategories[] = $category;
                    $newCategories = $this->parseChildList($newCategories, $children,$level);

                }
                // echo '<pre>';
                // print_r($newCategories);
                // echo '</pre>';
                $categories = $newCategories;
            }
        }
        return $categories;

    }

    private function parseChildList($newCategories, $categories, $level=0)
    {
        if($categories){
            $level++;
            $childDash = $this->childDesh($level);
            foreach($categories as $category){
                $children = $category['children'];
                unset($category['children']);
                $category['name'] = $childDash.$category['name'];
                $newCategories[] = $category;
                $newCategories = $this->parseChildList($newCategories, $children,$level);
            }
        }
        return $newCategories;
    }
    private function childDesh($length)
    {
        $string = '';
        for($i = 0; $i<$length; $i++){
            $string.='--';
        }
        return $string;
    }

    /* 獲取某一個分類名稱的id*/
    function getCategoryID($name){
        $cat = Categories::find()->where(['name'=>$name])->one();
        return $cat->id;
    }
}
