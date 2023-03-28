  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="row">
    <div class="col-4">
        <!--Normal select -->
        <select name="category" id="category">
          <option value="Select">Select</option>
        
        </select>
    </div>
    <div class="col-4">
        <!--Normal select2 Search -->
        <select class="js-example-basic-single" id="category_select2" name="category_select2" style="width:100%">
          <option value="Select">Select</option>
         
        </select>

    </div>
    <div class="col-4">
        <!--Normal select2 Multi Select-->
        <select class="js-example-basic-multiple" id="category_select2_multi" name="category_select2_multi[]" multiple="multiple" style="width:100%">
          <option value="Select">Select</option>
         
        </select>
    </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // Checking Whether the local storage is there or not if not false else true returns
    console.log(localStorage.hasOwnProperty('CATEGORY'))
    if(localStorage.hasOwnProperty('CATEGORY')==false)
    {
        $.post("fetch_data.php", function(data, status){
            
            localStorage.setItem('CATEGORY', data);
            GetDataFromStorageAndFillDropDown('category','CATEGORY');
    
            GetDataFromStorageAndFillDropDown('category_select2','CATEGORY');
    
            GetDataFromStorageAndFillDropDown('category_select2_multi','CATEGORY');
        });
        
    }
    else
    {
            GetDataFromStorageAndFillDropDown('category','CATEGORY');
    
            GetDataFromStorageAndFillDropDown('category_select2','CATEGORY');
    
            GetDataFromStorageAndFillDropDown('category_select2_multi','CATEGORY');
    }
   
   
    
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('.js-example-basic-multiple').select2();
}); 

function GetDataFromStorageAndFillDropDown(dropDownName,localStorageName)
{
    // READ STRING FROM LOCAL STORAGE
    var retrievedObject = localStorage.getItem(localStorageName);
    
    // CONVERT STRING TO REGULAR JS OBJECT
    var parsedObject = JSON.parse(retrievedObject);
    
    //console.log(parsedObject.data.length);
    // ACCESS DATA
    //console.log(parsedObject.data[0]);
    var ctr = 0;
   
    $.each(parsedObject.data,function(){
         var val=[];
            $.each(parsedObject.data[ctr], function(index, value) {
                val.push(value);
            });
        $('#'+dropDownName).append($('<option>').text(val[1]).attr('value', val[0]));
       
        ctr = ctr +1;
    })
    
}     
    
    
</script>