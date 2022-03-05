
// Dealing with Textarea Height
function calcHeight(value) {
    let numberOfLineBreaks = (value.match(/\n/g) || []).length;
    // min-height + lines x line-height + padding + border
    let newHeight = 20 + numberOfLineBreaks * 22 + 11 + 10;

    return newHeight+ "px";
  }

  var textareas = document.querySelectorAll(".autogrow");

  // const growers = document.querySelectorAll(".grow-wrap");

  // growers.forEach((grower) => {
  //   const textarea = grower.querySelector("textarea");
  //   textarea.addEventListener("input", () => {
  //     grower.dataset.replicatedValue = textarea.value;
  //   });
  // });

  // select each one of textarea
  textareas.forEach((textarea)=>{
    textarea.style.resize='none';
    textarea.style.overflow='hidden';

    textarea.addEventListener("keyup", () => {
      textarea.style.height = calcHeight(textarea.value) ;
    });
  });
