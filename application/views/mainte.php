<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        <style type="text/css" media="all">
*, *:before, *:after {
  box-sizing: border-box;
  position: relative;
}

* {
  transform-style: preserve-3d;
}

:root {
  --duration: 3.2s;
  --stagger: .65s;
  --easing: cubic-bezier(.36,.07,.25,1);
  --offscreen: 130vmax;
  //cubic-bezier(.5, 0, .4, 1);
  --color-bg: #EF735A;
  --color-blue: #384969;
  --color-shadow: #211842;
}

html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
  overflow: hidden;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  background: var(--color-bg);
}

#app {
  height: 70vmin;
  width: 40vmin;
  display: flex;
  justify-content: center;
  align-items: center;
  transform: translateX(25vw) rotateX(-20deg) rotateY(-55deg);
  background: var(--color-blue);
  border-radius: 2vmin;
  perspective: 10000px;
  
  &:before {
    border: 10vmin solid white;
    border-left-width: 2vmin;
    border-right-width: 2vmin;
    border-radius: inherit;
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    border: 10vmin solid white;
    border-left-width: 2vmin;
    border-right-width: 2vmin;
    background: var(--color-blue);
  }
  
  > .papers, &:before {
    transform: translateZ(3vmin);
  }
  
  &:after {
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: inherit;
    border-radius: inherit;
    transform: translateZ(1.5vmin);
  }
  
  > .shadow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transform-origin: bottom center;
    transform: rotateX(90deg);
    background: var(--color-shadow);
    border-radius: inherit;
  }
}

.paper-shadow {
  background: var(--color-shadow);
  height: 50%;
  width: 100%;
  position: absolute;
  top: calc(100% + 3vmin);
  left: 0;
  transform-origin: top center;
  animation: shadow-in var(--duration) var(--easing) infinite;
  animation-delay: calc(var(--i) * var(--stagger));
  animation-fill-mode: both;
  
  @keyframes shadow-in {
    0%,5% {
      transform: scale(.8, 1) translateY(var(--offscreen));
    }
    100% {
      transform: scale(.8,0);
    }
  }
}

.papers {
  width: 30vmin;
  height: 40vmin;
  background: white;
}

.paper {
  --segments: 5;
  --segment: calc(100% * 1 / var(--segments));
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  
  
  animation: fly-in var(--duration) var(--easing) infinite;
  animation-delay: calc(
    (var(--i) * var(--stagger))
  );
  
  @keyframes fly-in {
    0%, 2% {
      transform: translateZ(var(--offscreen)) translateY(80%) rotateX(30deg);
    }
    80%, 100% {
      transform: translateZ(0px) translateY(0%) rotateX(0deg);
    }
  }
  
  > .segment {
    height: var(--segment);
  }
}


.segment {
  --rotate: 20deg;
  height: 100%;
  transform-origin: top center;
  background: white;
  border: 1px solid rgba(black, 0.2);
  border-top: none;
  border-bottom: none;
  
  > .segment {
    top: 98%;
  }
  
  animation: inherit;
  animation-name: curve-paper;
  
  @keyframes curve-paper {
    0%, 2% { transform: rotateX(var(--rotate,0deg)); }
    90%, 100% { transform: rotateX(0deg); }
  }

}

/* ---------------------------------- */

.paper.-rogue {
  transform-origin: top center -5vmin;
  
  .segment {
    --rotate: 30deg;
    animation-name: curve-rogue-paper;

    @keyframes curve-rogue-paper {
      0%, 50% { transform: rotateX(var(--rotate)); }
      100% { transform: rotateX(0deg); }
    }
  }
  
  // First segment of the paper
  > .segment {
    animation: inherit;
    animation-name: rogue-paper;
    transform-origin: left top 20vmin;
  
    @keyframes rogue-paper {
      0%, 2% {
        transform: rotateX(1.5turn) 
      }
      80%, 100% {
        transform: rotateX(0turn);
      }
    }
  }

}
        </style>
    </head>
    
    <body>
    <a href="https://youtu.be/Fdq95qVG7F4" target="_blank" data-keyframers-credit style="color: #FFF"></a>
<script src="https://codepen.io/shshaw/pen/QmZYMG.js"></script>

<div id="app">
  <div class="papers" style="--total: 5">
    
    <div class="paper -rogue" style="--i: 0">
      <div class="segment">
        <div class="segment">
          <div class="segment">
            <div class="segment">
              <div class="segment"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="paper" style="--i: 1">
      <div class="segment">
        <div class="segment">
          <div class="segment">
            <div class="segment">
              <div class="segment"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="paper" style="--i: 2">
      <div class="segment">
        <div class="segment">
          <div class="segment">
            <div class="segment">
              <div class="segment"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
        
    <div class="paper" style="--i: 3">
      <div class="segment">
        <div class="segment">
          <div class="segment">
            <div class="segment">
              <div class="segment"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="paper" style="--i: 4">
      <div class="segment">
        <div class="segment">
          <div class="segment">
            <div class="segment">
              <div class="segment"></div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <div class="shadow">
    <div class="paper-shadow" style="--i: 0"></div>
    <div class="paper-shadow" style="--i: 1"></div>
    <div class="paper-shadow" style="--i: 2"></div>
    <div class="paper-shadow" style="--i: 3"></div>
    <div class="paper-shadow" style="--i: 4"></div>
  </div>
</div>
    </body>
</html>
