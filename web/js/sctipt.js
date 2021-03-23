$(function(){
    $(document).on('click', '[data-toggle=reroute]', function(e) {
        e.preventDefault();
        var $this = $(this);
        var data = $this.data();
        var action = data.action;
        var $form = $this.closest('form');
        if ($form && action) {
            $form.attr('action', action).submit();
        } else {
            alert('Ошибка! Пожалуйста, сообщите администрации.');
        }
    });
});  // для кнопки добавить в админеке на вкладке характеристика, валидирует перед добавлением новой строки








