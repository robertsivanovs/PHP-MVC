/**
 * addAttribute
 * 
 * Creates & Adds 2 text fields - [Attribue name and Value, with costum <name="val-i or att-i">]
 * Creates & Adds 2 labels - [Attribute Name and Attribute Value]
 * 
 * Adds elements to <div class ="box2">
 */
const addAttribute = () => {

    // HTML counter which counts how many have been added.
    let counter = document.getElementsByClassName("counter");
    counter[0].value++;
    let i = counter[0].value;

    // Create elements.
    let att = document.createElement("input");
    let val = document.createElement("input");
    let caption1 = document.createElement("label");
    let caption2 = document.createElement("label");
    let linebrake = document.createElement("br");
    let linebrake2 = document.createElement("hr");

    // <div> To which elements will be added to
    let div = document.getElementsByClassName("box2");

    // Generate costum name for each text field
    att.name = "att-"+i;
    val.name = "val-"+i;

    caption1.innerText="Attribute name:";
    caption2.innerText="Attribute value:";

    // Set HTML attributes to elements
    caption1.setAttribute("class", "cap-"+i);
    caption2.setAttribute("class", "valcap-"+i);

    att.setAttribute("type", "text");
    att.setAttribute("placeholder", "Attribute name");
    att.setAttribute("required", "required");
    att.setAttribute("form", "form");

    val.setAttribute("type", "text");
    val.setAttribute("placeholder", "Attribute value");
    val.setAttribute("required", "required");
    val.setAttribute("form", "form");

    // Add elements to HTML
    div[0].appendChild(caption1);
    div[0].appendChild(att);
    div[0].appendChild(caption2);
    div[0].appendChild(val);
    div[0].appendChild(linebrake);
    div[0].appendChild(linebrake2);
}

/**
 * deleteAttribute
 * 
 * Deletes added fields and labels.
 * 
 */
const deleteAttribute = () => {

    // HTML counter which counts how many have been added.
    let counter = document.getElementsByClassName("counter");

    // Delete only if there are atleast 2 attributes
    if (counter[0].value >= 2) {
    let i = counter[0].value;

    // Get elements
    let att = document.getElementsByName("att-"+i);
    let val = document.getElementsByName("val-"+i);

    let caption1 = document.getElementsByClassName("cap-"+i);
    let caption2 = document.getElementsByClassName("valcap-"+i);

    // Remove elements
    att[0].remove();
    val[0].remove();
    caption1[0].remove();
    caption2[0].remove();

    // Decrease counter
    counter[0].value--;
    }
}