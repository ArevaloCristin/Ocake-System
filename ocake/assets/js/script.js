var chooseElement;
var newElement;
var isTrue;
var isSpaceTrue;
var mouseEnter = false;
var counter = 0;
var rectangle_height = 13;
var rectangleBodyHeight = 11;
var shape = 1;
var borderView = 5;
cakePrices = [300, 250, 200, 150, 100];
var hasStart = false;
var cakeAmount = 300;
var totalAmount = 300;
var itemsArr = [];
var addonPositions = [];
var addonCount = 0;
var cakeBase64Src;

const moves = function (element) {
  const elements = document.querySelectorAll(".draggables");
  const cake_space = document.querySelector(".cake-container");

  elements.forEach((element) => {
    element.addEventListener("dragstart", () => {
      element.style.position = "absolute";
      identifyDraggables();
    });
    // element.addEventListener("drag", (e) => {

    // });
    element.addEventListener("dragend", (e) => {
      // changing position of the addons
      console.log(isSpaceTrue);
      if (isSpaceTrue) {
        // check if the mouse position is inside the drop space
        var x = e.pageX;
        var y = e.pageY;
        var TopOff = element.lastElementChild.width;
        var cakeContainerTop = cake_space.offsetTop;
        var cakeContainerLeft = cake_space.offsetLeft;
        var percentage = (TopOff / 100) * 50;
        element.style.left = x - cakeContainerLeft - percentage + "px";
        element.style.top = y - cakeContainerTop - percentage + "px";
      }
      isSpaceTrue = false;
    });
    cake_space.addEventListener("dragenter", (e) => {
      isSpaceTrue = true;
    });
    cake_space.addEventListener("dragover", (e) => {
      isSpaceTrue = true;
    });
    cake_space.addEventListener("dragleave", (e) => {
      setTimeout(() => {
        isSpaceTrue = false;
      }, 10);
    });
    element.addEventListener("mouseover", (e) => {
      // show delete button of addon

      var TopOff = element.lastElementChild.width;
      let delContainer = document.createElement("div");
      delContainer.classList.add("delete-box");
      if (TopOff < 80) {
        delContainer.style.left = TopOff - 10 + "%";
      } else {
        delContainer.style.left = 60 + "%";
      }
      delContainer.innerHTML =
        '<div><a type="button" class="del-btn float-end"><i class="fa-solid fa-trash"></i></a></div>';

      let resizeContainer = document.createElement("div");
      resizeContainer.classList.add("resize-box");
      // resizeContainer.style.top = TopOff + 20 + "%";
      if (TopOff < 80) {
        resizeContainer.style.left = TopOff + "%";
      } else {
        resizeContainer.style.left = 60 + "%";
        resizeContainer.style.top = 100 + "%";
      }
      resizeContainer.innerHTML =
        '<div><a type="button" class="resize-btn float-end" draggable="true"><i class="fa-solid fa-expand"></i></a></div>';

      var child = element.childElementCount;
      if (child == 1) {
        element.insertBefore(delContainer, element.firstChild);
        element.insertBefore(resizeContainer, element.firstChild);
        element.style.userSelect = "auto";
        const delButton = document.querySelectorAll(".del-btn");
        delButton.forEach((button) => {
          button.addEventListener("click", (e) => {
            var addonId = newElement.getAttribute("data-id");
            var addonName = newElement.getAttribute("data-name");
            var addonPrice = newElement.getAttribute("data-price");
            var addonSrc = newElement.getAttribute("data-src");
            if (checkIfIncludes(itemsArr, addonId) != null) {
              var index = checkIfIncludes(itemsArr, addonId);
              var number = itemsArr[index]["qty"];
              if (number >= 2) {
                itemsArr[index]["qty"] = number - 1;
              } else {
                itemsArr.splice(index, 1);
              }
            }
            addItemToPriceTable(itemsArr);
            updateCakeAmount();
            element.remove();
          });
        });

        const resizePopup = document.querySelectorAll(".resize-box");
        resizePopup.forEach((popup) => {
          const resizeButton = document.querySelectorAll(".resize-btn");
          resizeButton.forEach((button) => {
            var startX,
              startY,
              imgWidth = 50,
              currentX,
              currentY;
            button.addEventListener("dragstart", (e) => {
              startX = e.clientX;
              startY = e.clientY;
            });
            button.addEventListener("drag", (e) => {
              const delPopups = document.querySelectorAll(".delete-box");
              delPopups.forEach((delPopup) => {
                delPopup.style.display = "none";
              });
              let Image = element.lastElementChild;
              var dimension = Math.abs(
                startX - e.pageX - (Image.width / 100) * 50
              );
              var test = startX - e.pageX;
              if (test > 0) {
                console.log("negative");
                imgWidth = Math.abs(test - imgWidth);
              } else {
                console.log("positive");
                imgWidth = Math.abs(test + imgWidth);
              }
              console.log(imgWidth);

              // console.log(Image.width + dimension2, "new");
              let resizeContainer = button.parentElement;
             if (dimension > 50 && dimension < 200) {
                Image.style.width = dimension + "px";
                Image.style.height = dimension + "px";
                var dim = Image.width;

                if (dim < 80) {
                  popup.style.left = TopOff + "%";
                } else {
                  popup.style.left = 60 + "%";
                  popup.style.top = 100 + "%";
                }
                isSpaceTrue = false;
              }

              // Image.style.border = "1px solid black";
            });
            button.addEventListener("dragend", (e) => {
              const delPopups = document.querySelectorAll(".delete-box");
              delPopups.forEach((delPopup) => {
                delPopup.style.display = "block";
              });
              isSpaceTrue = false;
            });
          });
        });
      }
    });
    element.addEventListener("mouseleave", (e) => {
      // hide delete button of addon
      var child = element.childElementCount;
      if (child == 3) {
        element.removeChild(element.firstChild);
        element.removeChild(element.firstChild);
        element.style.userSelect = "none";
      }
      // element.style.userSelect = "none";
    });
  });
};

const move = function (element) {
  const elements = document.querySelectorAll(".draggable");
  const cake_space = document.querySelector(".cake-container");
  const cake = document.querySelector("#cake");

  elements.forEach((element) => {
    element.addEventListener("dragstart", () => {
      //copy addon element to drop space when dragged.
      newElement = element.cloneNode(true);
      newElement.style.position = "absolute";
      if (counter++ > 0) {
        identifyDraggables();
      }
    });
    element.addEventListener("drag", (e) => {
      var x = e.pageX;
      var y = e.pageY;
      posx = x;
      posy = y;
    });
    element.addEventListener("dragend", (e) => {
      // dropping addon to drop space when drag ends.
      if (isTrue == true) {
        var x = e.pageX;
        var y = e.pageY;
        var cakeContainerTop = cake_space.offsetTop;
        var cakeContainerLeft = cake_space.offsetLeft;
        newElement.style.left = x - cakeContainerLeft - 25 + "px";
        newElement.style.top = y - cakeContainerTop - 25 + "px";
        newElement.classList.add("draggables");
        newElement.classList.remove("draggable");
        document.querySelector(".cake-container").appendChild(newElement);
        moves("draggables");
        var addonId = newElement.getAttribute("data-id");
        var addonName = newElement.getAttribute("data-name");
        var addonPrice = newElement.getAttribute("data-price");
        var addonSrc = newElement.getAttribute("data-src");
        if (checkIfIncludes(itemsArr, addonId) != null) {
          var index = checkIfIncludes(itemsArr, addonId);
          var number = itemsArr[index]["qty"];
          itemsArr[index]["qty"] = number + 1;
        } else {
          itemsArr.push({
            id: addonId,
            name: addonName,
            price: addonPrice,
            src: addonSrc,
            qty: 1,
          });
        }
        addonPositions.push(newElement.outerHTML);
        addonCount++;
        updateTotalAmount();
        addItemToPriceTable(itemsArr);
        hasStart = true;
      }
    });

    cake_space.addEventListener("dragenter", (e) => {
      isTrue = true;
    });
    cake_space.addEventListener("dragover", (e) => {
      e.preventDefault();
      isTrue = true;
    });
    cake_space.addEventListener("dragleave", (e) => {
      setTimeout(() => {
        isTrue = false;
      }, 10);
    });
    cake.addEventListener("dragover", (e) => {
      isTrue = true;
    });
    cake.addEventListener("dragleave", (e) => {
      setTimeout(() => {
        isTrue = false;
      }, 10);
    });
  });
};

function checkIfIncludes(array, val) {
  // check if addon exist on drop space.
  var isTrue = null;
  for (var x = 0; x < array.length; x++) {
    if (array[x]["id"] == val) {
      isTrue = x;
      break;
    }
  }
  return isTrue;
}

const identifyDraggables = function () {
  // identify addons inside drop space.
  const draggableItem = document.querySelectorAll(".draggables");

  draggableItem.forEach((element) => {
    element.addEventListener("dragover", (e) => {
      e.preventDefault();
      isTrue = true;
      isSpaceTrue = true;
    });
    element.addEventListener("dragleave", (e) => {
      setTimeout(() => {
        isTrue = false;
        isSpaceTrue = false;
      }, 10);
    });
  });
};

//////////////Resize Draggables//////////////////

const resizeAddons = function () {
  const elements = document.querySelectorAll(".draggables");
};

//////////////layers////////////////////////////

window.onload = function () {
  // initialize all functions.
  move("draggable");
  displayLayerCount();
  listOfLayer();
  createBaseLayer();
  loadColorPicker();
};
const add = document.querySelector("#addLayer");
const remove = document.querySelector("#removeLayer");

var count = 1;
var height = 20;
var width = 60;
var cake_dimension = 200;
var cake_half_dimension = -100;
var square_top_pixel = 100;
var square_border_view = 5;
var cake_gap = 40;

const createBaseLayer = function () {
  // create base layer of the cake.
  const cakeDiv = document.getElementById("cake");
  cakeDiv.innerHTML = "";

  if (shape == 1) {
    var html = "";
    html +=
      '<div class="circle-layer color-layer-1" data-layer="1" style="height: ' +
      height +
      "vh; width: " +
      width +
      'vh;">';
    html += '<div class="oval top-oval top-oval-layer-1"></div>';
    html += '<div class="oval bottom-oval color-layer-1"></div>';
    html += "</div>";
    cakeDiv.innerHTML = html;
  } else if (shape == 2) {
    let rectangle = document.createElement("div");
    rectangle.classList.add("rectangle-layer");
    let rectangle_top = document.createElement("div");
    rectangle_top.classList.add("top-rectangle");
    rectangle_top.classList.add("color-border-1");
    rectangle_top.setAttribute("data-layer", 1);
    let rectangle_middle = document.createElement("div");
    rectangle_middle.classList.add("middle-rectangle");
    rectangle_middle.classList.add("color-layer-1");
    rectangle_middle.setAttribute("data-layer", 1);

    rectangle.appendChild(rectangle_top);
    rectangle.appendChild(rectangle_middle);
    cakeDiv.appendChild(rectangle);
    console.log("rectangle rendered");
  } else if (shape == 3) {
    let square = document.createElement("div");
    square.classList.add("square-layer");
    let square_top = document.createElement("div");
    square_top.classList.add("top-square");
    square_top.classList.add("color-border-1");
    square_top.setAttribute("data-layer", 1);
    let square_middle = document.createElement("div");
    square_middle.classList.add("middle-square");
    square_middle.classList.add("color-layer-1");
    square_middle.setAttribute("data-layer", 1);

    square.appendChild(square_top);
    square.appendChild(square_middle);
    cakeDiv.appendChild(square);
    console.log("cube rendered");
  } else if (shape == 4) {
    let heart = document.createElement("div");
    heart.classList.add("heart-layer");
    let heart_top = document.createElement("div");
    heart_top.classList.add("heart-layer-top-1");
    let heart_middle = document.createElement("div");
    heart_middle.classList.add("heart-layer-middle-1");

    heart.appendChild(heart_top);
    heart.appendChild(heart_middle);
    cakeDiv.appendChild(heart);
    console.log("heart rendered");
  }
};

add.addEventListener("click", () => {
  // add cake layer.
  if (count < 5) {
    height -= 3;
    width -= 10;
    borderView -= 1;
    rectangle_height -= 1;
    rectangleBodyHeight -= 1;
    square_border_view -= 0.5;
    square_top_pixel -= 10;
    cake_gap -= 10;
    cake_dimension -= 30;
    cake_half_dimension = -((cake_dimension / 100) * 50);
    count++;
    hasStart = true;
    renderLayer();
    updateCakeAmount();
    displayLayerCount();
    listOfLayer();
    loadColorPicker();
  }
});

remove.addEventListener("click", () => {
  // reduce cake layer.
  if (count > 1) {
    height += 3;
    width += 10;
    borderView += 1;
    rectangle_height += 1;
    rectangleBodyHeight += 1;
    square_border_view += 0.5;
    square_top_pixel += 10;
    cake_gap += 10;
    cake_dimension += 30;
    cake_half_dimension = -((cake_dimension / 100) * 50);
    count--;
    renderLayer(false);
    updateCakeAmount();
    displayLayerCount();
    listOfLayer(false);
    loadColorPicker();
  }
});

const renderLayer = function (add = true) {
  // render the added layer to the cake.
  const cakeDiv = document.getElementById("cake");

  if (shape == 1) {
    let mainDiv = document.createElement("div");
    mainDiv.classList.add("circle-layer");
    mainDiv.classList.add("color-layer-" + count);
    mainDiv.setAttribute("data-layer", count);
    mainDiv.style.width = width + "vh";
    mainDiv.style.height = height + "vh";
    mainDiv.style.zIndex = count;

    let top = document.createElement("div");
    top.classList.add("oval");
    top.classList.add("top-oval");
    top.classList.add("top-oval-layer-" + count);

    let bottom = document.createElement("div");
    bottom.classList.add("oval");
    bottom.classList.add("bottom-oval");
    bottom.classList.add("color-layer-" + count);

    mainDiv.appendChild(top);
    mainDiv.appendChild(bottom);

    if (add) {
      cakeDiv.insertBefore(mainDiv, cakeDiv.firstChild);
    } else {
      cakeDiv.removeChild(cakeDiv.firstChild);
    }
  } else if (shape == 2) {
    const rootVar = document.documentElement;
    let rectangle = document.createElement("div");
    rectangle.classList.add("rectangle-layer");
    let rectangle_top = document.createElement("div");
    rectangle_top.classList.add("top-rectangle");
    rectangle_top.classList.add("color-border-" + count);
    rectangle_top.setAttribute("data-layer", count);
    let rectangle_middle = document.createElement("div");
    rectangle_middle.classList.add("middle-rectangle");
    rectangle_middle.classList.add("color-layer-" + count);
    rectangle_middle.setAttribute("data-layer", count);
    rectangle.style.width = width - 3 + "vh";
    rectangle.style.zIndex = count + 2;
    rectangle.style.height = rectangle_height + "vh";
    rectangle_middle.style.height = rectangleBodyHeight + "vh";
    rectangle_top.style.width = width - 3 + "vh";
    rectangle_top.style.borderLeft = borderView + "vh solid transparent";
    rectangle_top.style.borderRight = borderView + "vh solid transparent";

    rectangle.appendChild(rectangle_top);
    rectangle.appendChild(rectangle_middle);
    if (add) {
      cakeDiv.insertBefore(rectangle, cakeDiv.firstChild);
    } else {
      cakeDiv.removeChild(cakeDiv.firstChild);
    }
  } else if (shape == 3) {
    let square = document.createElement("div");
    square.classList.add("square-layer");
    let square_top = document.createElement("div");
    square_top.classList.add("top-square");
    square_top.classList.add("color-border-" + count);
    square_top.setAttribute("data-layer", count);
    let square_middle = document.createElement("div");
    square_middle.classList.add("middle-square");
    square_middle.classList.add("color-layer-" + count);
    square_middle.setAttribute("data-layer", count);
    square.style.width = width - 10 + "vh";
    square.style.zIndex = count + 2;
    square.style.height = rectangle_height + "vh";
    square_middle.style.height = rectangleBodyHeight - 1 + "vh";
    square_top.style.width = width - 10 + "vh";
    square_top.style.borderLeft = borderView + "vh solid transparent";
    square_top.style.borderRight = borderView + "vh solid transparent";
    square_top.style.borderBottom = square_top_pixel + "px solid #F1F3F3";

    square.appendChild(square_top);
    square.appendChild(square_middle);
    if (add) {
      cakeDiv.insertBefore(square, cakeDiv.firstChild);
    } else {
      cakeDiv.removeChild(cakeDiv.firstChild);
    }
  } else if (shape == 4) {
    let heart = document.createElement("div");
    heart.classList.add("heart-layer");
    let heart_top = document.createElement("div");
    heart_top.classList.add("heart-layer-top-" + count);
    let heart_middle = document.createElement("div");
    heart_middle.classList.add("heart-layer-middle-" + count);
    heart.style.zIndex = count + 2;

    heart.appendChild(heart_top);
    heart.appendChild(heart_middle);
    if (add) {
      cakeDiv.insertBefore(heart, cakeDiv.firstChild);
    } else {
      cakeDiv.removeChild(cakeDiv.firstChild);
    }
  }
};

const displayLayerCount = function (add = true) {
  // update layer count
  const quant = document.querySelector(".quant-input");
  quant.value = count;
};

const listOfLayer = function (add = true) {
  // display the cake layer list on the tools and create color picker for each layer.
  const layerList = document.getElementById("layers");

  let list = document.createElement("div");
  list.classList.add("d-flex");

  let divider1 = document.createElement("div");
  divider1.classList.add("p-2");

  let divider2 = document.createElement("div");
  divider2.classList.add("p-2");

  let divider3 = document.createElement("div");
  divider3.classList.add("p-2");

  let colorPicker = document.createElement("input");
  colorPicker.setAttribute("type", "color");
  colorPicker.setAttribute("id", "colorPicker");
  colorPicker.setAttribute("value", "#FFFFFF");
  colorPicker.setAttribute("data-layer", count);

  let label = document.createElement("label");
  label.classList.add("layer-text");
  let text = document.createTextNode("Layer" + count);

  let icon = document.createElement("i");
  icon.classList.add("fa-solid");
  icon.classList.add("fa-layer-group");
  icon.classList.add("text-white");

  label.appendChild(text);
  divider1.appendChild(icon);
  divider2.appendChild(label);
  divider3.appendChild(colorPicker);
  list.appendChild(divider1);
  list.appendChild(divider2);
  list.appendChild(divider3);

  if (add == true) {
    layerList.insertBefore(list, layerList.firstChild);
  } else {
    layerList.removeChild(layerList.firstChild);
  }
};

/////////////color picker///////////////

const loadColorPicker = function () {
  const colorButton = document.querySelectorAll("#colorPicker");

  colorButton.forEach((picker) => {
    picker.addEventListener("input", () => {
      // change color of cake layers depends on the color picked.
      var layerID = picker.getAttribute("data-layer");
      const top_oval = document.querySelectorAll(".top-oval-layer-" + layerID);
      top_oval.forEach((color) => {
        color.style.backgroundColor = blendColors(picker.value, "#C4C3C3", 0.2);
      });
      const layerColor = document.querySelectorAll(".color-layer-" + layerID);
      const layerColorBorder = document.querySelectorAll(
        ".color-border-" + layerID
      );
      layerColor.forEach((color) => {
        color.style.backgroundColor = picker.value;
      });
      layerColorBorder.forEach((color) => {
        color.style.borderBottom = "100px solid " + picker.value;
      });
      document.documentElement.style.setProperty(
        "--layer-color-top-" + layerID,
        blendColors(picker.value, "#C4C3C3", 0.2)
      );
      document.documentElement.style.setProperty(
        "--layer-color-middle-" + layerID,
        picker.value
      );
    });
  });
};

function blendColors(colorA, colorB, amount) {
  const [rA, gA, bA] = colorA.match(/\w\w/g).map((c) => parseInt(c, 16));
  const [rB, gB, bB] = colorB.match(/\w\w/g).map((c) => parseInt(c, 16));
  const r = Math.round(rA + (rB - rA) * amount)
    .toString(16)
    .padStart(2, "0");
  const g = Math.round(gA + (gB - gA) * amount)
    .toString(16)
    .padStart(2, "0");
  const b = Math.round(bA + (bB - bA) * amount)
    .toString(16)
    .padStart(2, "0");
  return "#" + r + g + b;
}

////////////change shape/////////////////
const shapeButton = document.querySelectorAll(".shape-button");

shapeButton.forEach((button) => {
  button.addEventListener("click", () => {
    // change the shape of the cake.
    if (hasStart) {
      if (
        confirm(
          // alert user when changing shape.
          "Selecting this shape will lost your current customized design."
        )
      ) {
        // Save it!
        var buttonId = button.getAttribute("data-id");
        shape = buttonId;
        height = 20;
        width = 60;
        borderView = 5;
        rectangle_height = 13;
        rectangleBodyHeight = 11;
        square_border_view = 5;
        square_top_pixel = 100;
        cake_amount = 300;
        totalAmount = 300;
        count = 1;
        itemsArr = [];
        const elements = document.querySelectorAll(".draggables");
        elements.forEach((element) => {
          element.remove();
        });

        document.getElementById("layers").innerHTML = "";
        createBaseLayer();
        listOfLayer();
        displayLayerCount();
        updateCakeAmount();
        loadColorPicker();
        updateTotalAmount();
        addItemToPriceTable();
        hasStart = false;
      }
    } else {
      var buttonId = button.getAttribute("data-id");
      shape = buttonId;
      height = 20;
      width = 60;
      borderView = 5;
      rectangle_height = 13;
      rectangleBodyHeight = 11;
      square_border_view = 5;
      square_top_pixel = 100;
      count = 1;
      document.getElementById("layers").innerHTML = "";
      createBaseLayer();
      listOfLayer();
      updateCakeAmount();
      displayLayerCount();
      loadColorPicker();
    }
  });
});

const addItemToPriceTable = function (array) {
  // add addons in the price table.
  const priceTable = document.querySelector("#price_table");
  console.log("added");
  priceTable.innerHTML = "";
  if (array.length != 0) {
    for (var x = 0; x < array.length; x++) {
      let mainDiv = document.createElement("div");
      mainDiv.classList.add("p-1");
      mainDiv.id = "price_table";

      let div2 = document.createElement("div");
      div2.classList.add("p-1");
      div2.classList.add("d-flex");
      div2.classList.add("items");

      let div2_inner1 = document.createElement("div");
      div2_inner1.classList.add("p-1");
      div2_inner1.classList.add("image-card");

      let div2_inner2 = document.createElement("div");
      div2_inner1.classList.add("p-1");

      let addon_image = document.createElement("img");
      addon_image.setAttribute("src", array[x]["src"]);
      addon_image.style.height = 30 + "px";
      addon_image.style.width = 30 + "px";

      let addon_name = document.createElement("p");
      addon_name.classList.add("name-label");

      let addon_price = document.createElement("p");
      addon_price.classList.add("price-label");

      let addon_name_val = document.createTextNode(
        array[x]["name"] + "(x" + array[x]["qty"] + ")"
      );
      let addon_price_val = document.createTextNode(
        "₱" + (array[x]["price"] * array[x]["qty"]).toFixed(2)
      );

      div2_inner1.appendChild(addon_image);

      addon_name.appendChild(addon_name_val);
      addon_price.appendChild(addon_price_val);

      div2_inner2.appendChild(addon_name);
      div2_inner2.appendChild(addon_price);

      div2.appendChild(div2_inner1);
      div2.appendChild(div2_inner2);

      mainDiv.appendChild(div2);

      priceTable.appendChild(mainDiv);
    }
  } else {
    priceTable.innerHTML = "";
  }
};

const updateCakeAmount = function () {
  // update cake amount
  const cakePrice = document.querySelector(".cake-price-label");
  const cakeQty = document.querySelector(".cake-layer-quantity");

  var total_layer = 0;

  for (var x = 0; x < count; x++) {
    total_layer += cakePrices[x];
  }
  cakeAmount = total_layer;
  cakeQty.innerHTML = "Cake layer (x" + count + ")";
  cakePrice.innerHTML = "₱" + total_layer.toFixed(2);
  updateTotalAmount();
};

const updateTotalAmount = function () {
  //update total amount
  const cake_amount = document.querySelector(".total-label");

  if (Array.isArray(itemsArr) || itemsArr.length) {
    var layers = cakeAmount;
    var add_on = 0;
    for (var x = 0; x < itemsArr.length; x++) {
      add_on += itemsArr[x]["price"] * itemsArr[x]["qty"];
    }
    var total_price = layers + add_on;
    totalAmount = total_price;
    cake_amount.innerHTML = "Total: ₱" + total_price.toFixed(2);
  } else {
    cake_amount.innerHTML = "Total: ₱" + cakeAmount.toFixed(2);
  }
};

const createCakePrev = function () {
  // show cake preview and save form.
  html2canvas(document.querySelector(".cake-container")).then((canvas) => {
    document.querySelector("#designPreview").innerHTML = "";
    canvas.style.height = 500 + "px";
    canvas.style.width = 500 + "px";
    cakeBase64Src = canvas.toDataURL("image/png");
    document.querySelector("#designPreview").appendChild(canvas);
    document.querySelector("#price").value = "₱" + totalAmount.toFixed(2);
  });
};

const saveButton = document.querySelector("#saveCake");

saveButton.addEventListener("click", () => {
  // save cake to products and add to cart.
  var user_id = $("#user_id").val();
  var canvas = cakeBase64Src;
  var message = $("#cake_message").val();
  var flavor = $("#flavor").val();
  var price = $("#price").val();
  var status = $("#status").val();

  var url = window.location.origin + "/ocake/save_design";

  $.post(
    url,
    {
      user_id: user_id,
      canvas: canvas,
      message: message,
      flavor: flavor,
      price: totalAmount,
      status: status,
    },
    function (response) {
      var decode = JSON.parse(response);
      if (decode.response == 1) {
        // alert("Added to cart");
        var url1 = window.location.origin + "/ocake/add_cart";
        $.post(
          url1,
          {
            canvas: canvas,
            message: message,
            flavor: flavor,
            price: totalAmount,
            status: status,
            quantity: 1,
            occasion: "Customized",
            pid: decode.prod_id,
          },
          function (response) {
            alert("Added to cart");
            window.location.replace(window.location.origin + "/ocake/cart");
          }
        );
      } else {
        alert("Something went wrong.");
      }
    }
  );
});
