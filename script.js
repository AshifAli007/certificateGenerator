var doc = new jsPDF();

const generatePDF = ()=>{
    // doc.text(20, 20, 'Hello world!');
    // doc.text(20, 30, 'This is client-side Javascript to generate a PDF.');

    // // Add new page
    // // doc.addPage();
    // // doc.text(20, 20, 'Visit CodexWorld.com');

    // // Save the PDF
    // doc.save('document.pdf');
    var doc = new jsPDF();
var elementHTML = $('#certificate').html();
var specialElementHandlers = {
    '#elementH': function (element, renderer) {
        return true;
    }
};
doc.fromHTML(elementHTML, 15, 15, {
    'width': 170,
    'elementHandlers': specialElementHandlers
});

// Save the PDF
doc.save('sample-document.pdf');
}


