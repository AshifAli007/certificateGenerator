var doc = new jsPDF('l', 'mm', 'a4');

async function generatePDF(){
    var certificate = document.querySelector("#certificate");

    html2canvas(certificate, {
        // allowTaint: true,
        // useCORS: true,
        width: 1125,
        height: 796,
    }).then((canvas)=>{
      
        doc.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 298, 211);
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
    doc.save('certificate.pdf');

}