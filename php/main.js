
let id = $("input[name*='medicine_id']");
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    
    let mediname = $("input[name*='medi_name']");
    let type = $("input[name*='type']");
    let price = $("input[name*='m_price']");

    id.val(textvalues[0]);
    mediname.val(textvalues[1]);
    type.val(textvalues[2]);
    price.val(textvalues[3].replace("$", ""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
         textvalues[id++] = value.textContent;
     }
 }
 return textvalues;

}