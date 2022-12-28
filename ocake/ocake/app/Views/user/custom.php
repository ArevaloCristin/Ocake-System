<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/customization.css" />
</head>

<body>

  <p>Drag the ball.</p>

  <img src="https://en.js.cx/clipart/soccer-gate.svg" id="gate" class="droppable">
  <img src="https://en.js.cx/clipart/ball.svg" id="ball">
  <img src="https://en.js.cx/clipart/ball.svg" id="ball1">

  <script>
    let currentDroppable = null;

    ball.onmousedown = function(event) {

      let shiftX = event.clientX - ball.getBoundingClientRect().left;
      let shiftY = event.clientY - ball.getBoundingClientRect().top;

      ball.style.position = 'absolute';
      ball.style.zIndex = 1000;
      document.body.append(ball);

      moveAt(event.pageX, event.pageY);

      function moveAt(pageX, pageY) {
        ball.style.left = pageX - shiftX + 'px';
        ball.style.top = pageY - shiftY + 'px';
      }

      function onMouseMove(event) {
        moveAt(event.pageX, event.pageY);

        ball.hidden = true;
        let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
        ball.hidden = false;

        if (!elemBelow) return;

        let droppableBelow = elemBelow.closest('.droppable');
        if (currentDroppable != droppableBelow) {
          if (currentDroppable) { // null when we were not over a droppable before this event
            leaveDroppable(currentDroppable);
          }
          currentDroppable = droppableBelow;
          if (currentDroppable) { // null if we're not coming over a droppable now
            // (maybe just left the droppable)
            enterDroppable(currentDroppable);
          }
        }
      }

      document.addEventListener('mousemove', onMouseMove);

      ball.onmouseup = function() {
        document.removeEventListener('mousemove', onMouseMove);
        ball.onmouseup = null;
      };

    };

    function enterDroppable(elem) {
      elem.style.background = 'pink';
    }

    function leaveDroppable(elem) {
      elem.style.background = '';
    }

    ball.ondragstart = function() {
      return false;
    };
  </script>

<script>
    let Droppable = null;

    ball1.onmousedown = function(event) {

      let shiftX = event.clientX - ball1.getBoundingClientRect().left;
      let shiftY = event.clientY - ball1.getBoundingClientRect().top;

      ball1.style.position = 'absolute';
      ball1.style.zIndex = 1000;
      document.body.append(ball1);

      moveAt(event.pageX, event.pageY);

      function moveAt(pageX, pageY) {
        ball1.style.left = pageX - shiftX + 'px';
        ball1.style.top = pageY - shiftY + 'px';
      }

      function onMouseMove(event) {
        moveAt(event.pageX, event.pageY);

        ball1.hidden = true;
        let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
        ball1.hidden = false;

        if (!elemBelow) return;

        let droppableBelow = elemBelow.closest('.droppable');
        if (currentDroppable != droppableBelow) {
          if (currentDroppable) { // null when we were not over a droppable before this event
            leaveDroppable(currentDroppable);
          }
          currentDroppable = droppableBelow;
          if (Droppable) { // null if we're not coming over a droppable now
            // (maybe just left the droppable)
            enterDroppable(Droppable);
          }
        }
      }

      document.addEventListener('mousemove', onMouseMove);

      ball1.onmouseup = function() {
        document.removeEventListener('mousemove', onMouseMove);
        ball1.onmouseup = null;
      };

    };

    function enterDroppable(elem) {
      elem.style.background = 'pink';
    }

    function leaveDroppable(elem) {
      elem.style.background = '';
    }

    ball1.ondragstart = function() {
      return false;
    };
  </script>


</body>
</html>