<template>
  <h1 class="maintitle">Meet Hamilton</h1>
  <img class="portrait" alt="meow jpg" src="../assets/meow.jpg">
  <div style="height:5px;"></div>
  <div class="tag">He's a pretty cool cat</div>

</template>

<script lang="ts">
    import { Options, Vue } from 'vue-class-component';

    @Options({
      props: {

      }
    })

    export default class Header extends Vue {

    }
</script>

<style>
    button:hover {
       background-color: #7b1fa2!important;
    }
    .button {
      font: 14px/14px DinWebCond, Sans-serif;
      color: #FFFFFF!important;
      background: #9c27b0!important;
      height: 33px;
      font-weight: 600;
      min-width:100px;
      border: none;
      border-radius: 4px;
      box-shadow: none;
      transition: opacity 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease, -webkit-box-shadow 0.3s ease;
      cursor: pointer;
       text-transform: uppercase;
      text-shadow: 0 1px 0 #000000;
      outline: none;
    }
    .menubar {
      border-radius:4px;
      display:flex;flex-direction: row; justify-content: space-evenly; align-items: center;
    }
    .portrait {
        max-width:384px;border-radius:4px;
        box-shadow: 0px 2px 4px -1px rgba(0,0,0,0.2),0px 4px 5px 0px rgba(0,0,0,0.14),0px 1px 10px 0px rgba(0,0,0,0.12);
    }
    .maintitle {
        color: rgba(0, 0, 0, 0.87);
        font-size: 6rem;
        font-family: "Roboto", "Helvetica", "Arial", sans-serif;
        font-weight: 300;
        line-height: 1;
        letter-spacing: -0.01562em;
        margin: 0;
        margin-bottom: 0.35em;
    }
    .tag {
        color: rgba(0, 0, 0, 0.87);
        font-size: 0.875rem;
        font-family: "Roboto", "Helvetica", "Arial", sans-serif;
        font-weight: 500;
        line-height: 1.57;
        letter-spacing: 0.00714em;
        margin-bottom: 0.35em;
    }
    @media (max-width:850px) {
      .maintitle {
        font-size: 3rem;
      }
    }
</style>
