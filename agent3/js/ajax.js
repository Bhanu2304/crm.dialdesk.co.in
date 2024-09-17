    function save_crm_tagging()
    {
        var phone_no = document.getElementById('phone_number').value;
        var customer_name = document.getElementById('first_name').value;
        var voc = document.getElementById('address1').value;
        var customer_address = document.getElementById('address2').value;
        var remarks = document.getElementById('address3').value;
        $.ajax({
                    type:'post',
                    url:'element/ajax_save_tagging.php',
                    data:{phone_no:phone_no,customer_name:customer_name,voc:voc,customer_address:customer_address,remarks:remarks},
                    success:function(data){
                          $('#crm_tagging_resp').html(data);
                          document.getElementById('first_name').value='';
                          document.getElementById('address1').value='';
                          document.getElementById('address2').value='';
                          document.getElementById('address3').value='';
                          
                    }
                });
        return false;
    }
