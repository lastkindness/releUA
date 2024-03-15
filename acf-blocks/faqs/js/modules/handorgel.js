import handorgel from 'handorgel';


let accordions = document.querySelectorAll('.handorgel');

for(let i = 0; i < accordions.length; i++) {
    let accordion = accordions[i];

    new handorgel(accordion, {
        multiSelectable: false
    })
}