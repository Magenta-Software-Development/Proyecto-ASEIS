$(document).ready(function () {

    //Mostrar la hora actual
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
    var dayWeek = date.getDay();

    var dayWeekText = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var monthText = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var dateText = dayWeekText[dayWeek] + ', ' + day + ' de ' + monthText[month] + ' de ' + year;

    $('#date').html(dateText);

});
