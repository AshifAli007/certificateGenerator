
function showEvent(e){
    let event = $("#eventName").val();
    $(`tbody tr:not(tr.${event})`).hide();
    $(`tr.${event}`).show();

}