//use to convert string special charecter in html intity
htmlspecialchars($str, ENT_QUOTES)
//use to convert string special charecter in html intity

//-----------------------------------------------------
.package-content ul li:before {
    content: '✔ ';
    margin-left: -20px;
    color: #f05d45;
}

//-----------------------------------------------------
n level dropdown
---------------------
function nlevelcat($parent_id,$level = Null, $prefix = '') {
    $catdata = array();
    $data = ProductCategory::orderBy('title')->where(['parent_id'=>$level,'status'=>1])->get();
    $category = '';
    if (count($data) > 0) {
        foreach ($data as $row) {
            if($parent_id == $row->id){
                $check = "selected";
            }else{
                $check = "";
            }
            $category .= "<option value='$row->id' ".$check.">".$prefix . $row->title."</option>";
            $category .= nlevelcat($parent_id,$row->id, $prefix . ' - ');
        }
    }
    return $category;
}

//-------------------------------------------------------------
Route group
------------
Route::group(['prefix' => 'post'], function(){
    Route::get('all','Controller@post');
    Route::get('user','Controller@post');
})

Route::group(['prefix' => 'post', 'middleware' => ['auth']], function(){
        Route::get('all','Controller@post');
        Route::get('user','Controller@post');
    })
-------------------------------------------------------------------
