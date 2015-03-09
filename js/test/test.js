jQuery(function($){
    /* สร้างฟังก์ชันสำหรับกรอกข้อมูลลงในฟอร์ม */
    var fillForm = function(form, data){
        $.each(data, function(i, field) {
            $(form+' input[name="'+field.name+'"]').val(field.value);
        });
    }
 
    /* สร้างฟังก์ชันสำหรับบันทึกข้อมูลจากฟอร์มลงใน localStorage */
    var saveFormData = function(form){
        data = form.serializeArray();
        console.log('data');
        console.log(data);
        localStorage.setItem('signinData', JSON.stringify(data));
    }
 
    /* ตรวจสอบว่ามีข้อมูลเก็บไว้ใน localStorage แล้วหรือยัง? */
    if(localStorage.getItem('signinData') != null){
        /* ถ้ามีแล้ว ให้กรอกข้อมูลลงในฟอร์ม โดยใช้ค่าจาก localStorage */
        fillForm('.form-signin', JSON.parse(localStorage.getItem('signinData')));
        localStorage.removeItem('signinData');
    }
 
    /* จะทำอะไร เมื่อ user กดปุ่ม submit ฟอร์ม? */
    $('.form-signin').on('submit', function(event){
        /* บันทึกข้อมูลจากฟอร์มลงใน localStorage */
        event.preventDefault();
        saveFormData($(this));
        console.log($(this));
    });
});