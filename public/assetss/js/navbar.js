const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

      accordionItemHeaders.forEach(accordionItemHeader => {
      accordionItemHeader.addEventListener("click", event => {

        accordionItemHeader.classList.toggle("active");
        const accordionItemBody = accordionItemHeader.nextElementSibling;
        if(accordionItemHeader.classList.contains("active")) {
          accordionItemBody.style.maxHeight =  "1000rem";
        }
        else {
          accordionItemBody.style.maxHeight = 0;
        }
        
      });
    });