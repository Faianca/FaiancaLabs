$(document).ready(function(){
        $('.addPeople').click(function(){

            var valueC = $('.addPeopleSelect').val(),
                buildId = $(this).attr('id');
            
            if(valueC == 0)
                alert('error');
                
               alert(buildId);
           
              $('#formAddPeople').submit();
        });
});


