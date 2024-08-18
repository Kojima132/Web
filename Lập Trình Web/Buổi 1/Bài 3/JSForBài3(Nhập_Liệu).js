function toggleInputFields() {
    const chanleRadio = document.querySelector('input[value="chanle"]');
    const songuyentoRadio = document.querySelector('input[value="songuyento"]');
    const inputTextsothuhai = document.getElementById('sothuhai_input');
    const labelTextsothuhai=document.getElementById('sothuhai_label');
    const labelTextsothunhat=document.getElementById('sothunhat_label');
    const inputTextsothunhat = document.getElementById('sothunhat_input');
    inputTextsothunhat.value = '';  
    inputTextsothuhai.value = '';
    if (chanleRadio.checked || songuyentoRadio.checked) {
        inputTextsothuhai.style.display = 'none';
        labelTextsothunhat.innerHTML='Mời nhập số:';
        labelTextsothuhai.style.display ='none';
    } else {
        inputTextsothuhai.style.display = 'block';
        inputTextsothuhai.style.marginTop='15px';
        labelTextsothunhat.innerHTML='Số thứ nhất:';
        inputTextsothuhai.style.marginRight='5px';
        labelTextsothuhai.style.display ='block';
        inputTextsothuhai.style.flex='2';
    }
}
