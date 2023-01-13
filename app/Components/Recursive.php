<?php
namespace App\Components;

use App\Models\Category;


class Recursive{
    private $htmlSelect = '';
    private $data;
    private $component='';

    public function categoryRecursive($parent_id,$id = 0,$text = ''){
        $this->data = Category::all();
        foreach ($this->data as $value)
        {
            if($value['parent_id'] ==$id){
                if(!empty($parent_id) && $parent_id == $value['category_id']) {
                    $this->htmlSelect .= "<option selected value='".$value['ma_PL']."'>".$text.$value['ten_PL']."</option>";
                } else{
                    $this->htmlSelect .= "<option value='".$value['ma_PL']."'>".$text.$value['ten_PL']."</option>";
                }
                $this->categoryRecursive($parent_id,$value['ma_PL'], $text.'&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        }
        return $this->htmlSelect;
    }

    public function getCategoryParent($parent_id){
        $category = Category::where('ma_PL',$parent_id)->first();
         if($category->parent_id==0){
            $this->component=$category->ten_PL;
            return $this->component;
        }else{
            $this->component = $this->getCategoryParent($category->parent_id);
        }
        return $this->component;
    }
}
