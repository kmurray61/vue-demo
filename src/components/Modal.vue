<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper"  @click.self="$emit('close')">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              Add your comment.
            </slot>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="input-field inline">
                <input id="nameTxt" type="text" v-model="name" >
                <label for="nameTxt" class="inputCls" >Your Name</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="input-field inline">
                <input id="commentTxt" type="text" >
                <label for="commentTxt" class="inputCls">Your Comment</label>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <button style="width: 100%;" class="button" @click="addComment">
                Add Comment
              </button>
            </slot>
          </div>

        </div>
      </div>
    </div>
  </transition>
</template>

<script lang="ts">
    import { Options, Vue } from 'vue-class-component';

    @Options({
      props: {
        errors: [],
        name:null
      }
    })

    export default class Modal extends Vue {
        public addComment(): void {
            const fname = (document.getElementById("nameTxt") as HTMLInputElement).value;
            const fcomment = (document.getElementById("commentTxt") as HTMLInputElement).value;
            this.checkForm (fname, fcomment);
        }
        public checkForm (name: string, comment: string): void  {
            if ( name && comment) {
              const requestOptions = {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: "author=" + name + "&timestamp=" + Date.now() + "&content=" + comment
              };
              fetch('https://virtualjam.net/react-demo/jasonator.php', requestOptions)
                  .then(async response => {
                    if ( !response.ok ) {
                      console.log('response error status = ' + response.status);
                    }
                    else {
                        console.error('response success');
                        window.location.href = "/";
                    }
                  })
                  .catch(error => {
                      console.error('There was an error!', error);
                  });
            }
            else {
               alert("You have a blank input");
            }
        }
    }
</script>

<style>
    .nameTxtCls {
        font: inherit;
        color: currentColor;
        width: 100%;
        border: solid 1px #CCCCCC;
        border-radius:4px;
        margin: 0;
        padding: 6px 0 7px 6px;
        display: block;
        min-width: 0;
        box-sizing: content-box;
        background: none;
        -webkit-tap-highlight-color: transparent;
    }
    .nameTxtCls:focus {
        outline:0;
    }
    .commentTxtCls {
      font: inherit;
      color: currentColor;
      width: 100%;
      border: solid 1px #CCCCCC;
      border-radius:4px;
      margin: 0;
      padding: 6px 0 7px 6px;
      display: block;
      min-width: 0;
      box-sizing: content-box;
      background: none;
      -webkit-tap-highlight-color: transparent;
    }
    .commentTxtCls:focus {
      outline:0;
    }
    .modal-mask {
      position: fixed;
      z-index: 9998;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: table;
      transition: opacity 0.3s ease;
    }
    .modal-wrapper {
      display: table-cell;
      vertical-align: middle;
    }
    .modal-container {
      top: 50%;
      left: 50%;
      width: 50%;
      height: 35%;
      display: flex;
      padding: 20px;
      position: absolute;
      max-width: 500px;
      min-width: 400px;
      transform: translate(-50%, -50%);
      min-height: 250px;
      box-sizing: content-box;
      flex-direction: column;
      justify-content: flex-start;
      background-color: #fff;
      border-radius: 4px;
    }
    .modal-header {
      margin-top: 0;
      color: #42b983;
      color: rgba(0, 0, 0, 0.87);
      font-size: 1.5rem;
      font-family: "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      line-height: 1.33;
      letter-spacing: 0;
      text-align: left;
    }
    .modal-footer {
      bottom: 20px;
      position: absolute;
      width: calc(100% - 60px);
    }
    .modal-body {
      margin: 20px 0;
    }
    .modal-default-button {
      float: right;
    }
    .modal-enter {
      opacity: 0;
    }
    .modal-leave-active {
      opacity: 0;
    }
    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }
    /* icon prefix focus color */
    .input-field {
      margin: 0!important;
    }
    .input-field.inline {
      width: 100%!important;
    }
    .row {
      margin-top: 20px;
      margin-bottom: 0;
      width: 100%!important;
    }
    /* label color */
    .input-field label {
      color: #000;
    }
    /* label focus color */
    .input-field input[type=text]:focus + label {
      color: #9c27b0!important;
    }
    /* label underline focus color */
    .input-field input[type=text]:focus {
      border: 1px solid #9c27b0!important;
      /*box-shadow: 0 1px 0 0 #9c27b0!important;*/
      box-shadow:unset!important;
      border-radius:4px!important;

    }
    /* valid color */
    .input-field input[type=text].valid {
      border: 1px solid #9c27b0!important;
      border-radius:4px;
      /*box-shadow: 0 1px 0 0 #9c27b0!important;*/
      box-shadow:unset!important;
    }
    /* invalid color */
    .input-field input[type=text].invalid {
      border: 1px solid #000;
      border-radius:4px;
      /*box-shadow: 0 1px 0 0 #9c27b0!important;*/
      box-shadow:unset!important;
    }
    /* icon prefix focus color */
    .input-field .prefix.active {
      color: #000;
    }
    .inputCls {
        margin-left:6px;
    }
    .input-field.inline input, .input-field.inline .select-dropdown {
      border: 1px solid #000!important;
      border-radius:4px;
    }
</style>
