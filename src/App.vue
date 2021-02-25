<template>
  <div id="v1">
    <my-header ></my-header>
    <modal v-if="showModal" @close="showModal = false"></modal>
    <button class="button" id="show-modal" @click="showModal = true">Tell me what you think of Hamilton</button>
    <my-comments ></my-comments>
  </div>
</template>

<script lang="ts">

import { Options, Vue } from 'vue-class-component';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import Comments from './components/Comments.vue';

@Options({
  components: {
    'my-header':Header,
    'modal':Modal,
    'my-comments':Comments
  },
})

export default class App extends Vue {
  data() {
    return {
      showModal: false
    }
  }
}
</script>

<style>
body {
  margin: 0;
  background-color: #fafafa;
}
#v1 {
  flex-direction: column;display:flex;align-items: center;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0;
  border:none 1px #CCCCCC;
  padding:5px;
  width: calc( 100% - 10px );
  height: calc( 100% - 10px );
  min-height: calc( 100% - 10px );
}
</style>
