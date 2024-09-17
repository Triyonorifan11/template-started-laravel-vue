<template>
    <div class="box-loader">
        <span class="loader"></span>
    </div>
</template>

<style scoped>
:root{
    --main-color : #00d0ff;
    --white-color: #fff;
}

.box-loader{
    position: fixed;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.132);
}
/* loader */
.loader {
  animation: rotate 1s infinite;
  height: 50px;
  width: 50px;
  display: inline-block;
}

.loader:before,
.loader:after {
  border-radius: 50%;
  content: "";
  display: block;
  height: 20px;
  width: 20px;
}
.loader:before {
  animation: ball1 1s infinite;
  background-color: var(--white-color);
  box-shadow: 30px 0 0 var(--main-color);
  margin-bottom: 10px;
}
.loader:after {
  animation: ball2 1s infinite;
  background-color: var(--main-color);
  box-shadow: 30px 0 0 var(--white-color);;
}

@keyframes rotate {
  0% {
    transform: rotate(0deg) scale(0.8);
  }
  50% {
    transform: rotate(360deg) scale(1.2);
  }
  100% {
    transform: rotate(720deg) scale(0.8);
  }
}

@keyframes ball1 {
  0% {
    box-shadow: 30px 0 0 var(--main-color);
  }
  50% {
    box-shadow: 0 0 0 var(--main-color);
    margin-bottom: 0;
    transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 var(--main-color);
    margin-bottom: 10px;
  }
}

@keyframes ball2 {
  0% {
    box-shadow: 30px 0 0 var(--white-color);;
  }
  50% {
    box-shadow: 0 0 0 var(--white-color);;
    margin-top: -20px;
    transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 var(--white-color);;
    margin-top: 0;
  }
}
/* end loader */
</style>