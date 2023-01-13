<?php

namespace App\Components;

use App\Models\Review;

class compare_popup
{

    public function htmlPopupCompare($product, $inStock, $compare, $p_gr)
    {
        $count_review = Review::where('ma_SP', $product->ma_SP)->count();
        $output = '<div id="replace-data-rel-4" class="popup-content" data-rel="4" >
        <div class="layer-close"></div>
        <div class="popup-container size-2 edit">
            <div class="popup-align">

                <div class="row">
                    <div class="col-12">
                        <table class="table table-tripped a" style="text-align-last: center;font:message-box">
                            <thead>
                                <tr class="edit">
                                <th>Mã SP </th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Thông Số</th>
                                    <th>Hình ảnh</th>
                                    <th>Phân loại</th>
                                </tr>
                                <tr>
                                    <td>' .$product->ma_SP. '</td>
                                    <td>' . $product->ten_SP . '</td>
                                    <td>$' . $product->gia_SP . '</td>
                                    <td style="width: 300px">' . $product->sort_mota_SP . '</td>
                                    <td> <img src="https://pczone.vn/PCZONE/public/images/product/' . $product->hinh_SP . '" ></td>
                                    <td style="width: 10px">' . $product->component . '</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="empty-space"></div>
                <div class"row"
                    <div class="col-12">
                        <select class="btn select_compare" data-depend="">
                            ';
        foreach ($compare as $comp) {
            if ($comp->ten_SP != $product->ten_SP) {
                $output .= '    <option selected disabled >Danh Sách So Sánh - '.$comp->component.'</option>
                                <option class="select_compare_'.$comp->ma_SP.'" id="'.$comp->ma_SP.'">'.$comp->ma_SP.''. '. ' .$comp->ten_SP . '</option>';
            }
        }
        $output .= '
                        </select>
                    </div>
                    <div class="empty-space"></div>
                    <div class="empty-space"></div>
               ';
        foreach ($compare as $comp) {
            if ($comp->ten_SP != $product->ten_SP) {
                $output .= '
                <div class="row compare_'.$comp->ma_SP.'">
                    <div class="col-12">
                        <table class="table table-tripped a" style="text-align-last: center;font:message-box">
                            <thead>
                                <tr class="edit">
                                    <th>Mã</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Thông số</th>
                                    <th>Hình ảnh</th>
                                    <th>Phân loại</th>
                                </tr>
                                <tr>
                                    <td>'.$comp->ma_SP.'</td>
                                    <td>' . $comp->ten_SP . '</td>
                                    <td>$' . $comp->gia_SP . '</td>
                                    <td style="width: 300px">' . $comp->sort_mota_SP . '</td>
                                    <td> <img src="images/product/' . $comp->hinh_SP . '" ></td>
                                    <td style="width: 10px">' . $comp->component . '</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                ';
            }
        }
        $output .= '
            <div class="button-close"></div>
        </div>
        </div>
    </div>';
        // $count_cate = count($category->ten_PL);
        return $output;
    }
}
