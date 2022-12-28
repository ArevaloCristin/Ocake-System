var boxes = $(".drag-el");

function cloneTarget() {

  var $target = $(this.target),
    $parent = $target.parent(),
    $newElement = $target.clone();

  TweenLite.set($newElement, {
    clearProps: "all"
  });

  $newElement.prependTo($parent);

  Draggable.create($newElement, {
    type: "x,y",
    bounds: window,
    onPress: cloneTarget,
    onRelease: function() {
      this.disable();
    }
  });

}

Draggable.create(boxes, {
  type: "x,y",
  bounds: window,
  onPress: cloneTarget,
  onRelease: function() {
    this.disable();
  }
})
document.querySelectorAll(".droptarget").forEach(item =>{
  item.addEventListener("dragover", event =>{
    event.preventDefault();
    console.log("dragged over zone....");
  })
})

