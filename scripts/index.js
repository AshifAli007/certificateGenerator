var doc = new jsPDF('l', 'mm', 'a4');
var certificateName;
var eventName;
var certificateDesigns = {
    choices: "./images/choices_certificate.png",
    mindtribe: "./images/mind_tribe_certificate.png",
    admin: "./images/admin_certificate.png"
};
async function generatePDF(){
    eventName = $('.eventName').html();
    $('#certificate').css('background-image', 'url(' + certificateDesigns[eventName.toLowerCase().split(" ").join("")]  + ')');
    var certificate = document.querySelector("#certificate");
    let loader = `      <div class="text-center" id="loader">
                            <div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </div>`;
    $('body').append(loader);
    certificateName = $('.name').html();
    html2canvas(certificate, {
        // allowTaint: true,
        // useCORS: true,
        width: 1125,
        height: 796,
    }).then((canvas)=>{
        // document.body.appendChild(canvas)

        doc.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 298, 211);
        $("#loader").css('display', 'none');
        $('.container').append(canvas);
        $('.container').append('<button class="save btn btn-success" type="button" onclick="savePDF()">Download Certificate</button>');

        $(canvas).css({
            "width": "100%",
            "height": "auto"
        });

    });
    $('#certificate').css({
        'display': 'none'
    });


}

async function savePDF(){
    var fileName = "certificate"+certificateName+".pdf";
    doc.save(fileName.replace(/ /g,''));

}