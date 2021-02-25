<template>
  <div class="commentMC">
      <div class="title">[ Comments ]</div>
      <div style="width: 100%;min-width: 400px;min-height: 300px;" id="resHolder">
        <div v-for="(listItem, index) in list" :key="index">
            <div v-if="decodeURIComponent(listItem.author) !== ''" class='dateDivHolder'>
              <div id='iconHolder' class='circleStyle' >{{ decodeURIComponent(listItem.author.toUpperCase().charAt(0)) }}</div>
              <div style='width:10px;'></div>
              <div class='comment'>
                  <div class='dateDivHolder'>
                      <div class='listCell'>
                          <div id='authorTxt'>{{ decodeURIComponent(listItem.author) }}</div>
                          <div id='contentTxt'>{{ decodeURIComponent(listItem.content) }}</div>
                      </div>
                      <div class="dateTxtCls" id='dateTxt'>{{ this.getTime(listItem.timestamp) }}</div>
                  </div>
              </div>
            </div>
        </div>
      </div>
  </div>
</template>

<script lang="ts">
    import { Vue } from 'vue-class-component';

    export default class Comments extends Vue {
        list = [{author: '',timestamp:'',content:'' }];
        mounted(){
           setTimeout( this.getComments, 100);
        }
        getComments(): void {
            fetch("https://virtualjam.net/react-demo/jasonator.php").then((res) => {
              return res.json();
            }).then((users) => {
                this.list.push(...users);
            }).catch(error => {
                console.log(error)
            })
        }
        getTime( ts: string ): string {
            const timestamp = parseFloat(ts);
            const date = new Date(timestamp);

            let hours = date.getHours();
            if ( hours > 12 ) {
                hours -= 12;
            }
            else if ( hours === 0 ) {
                hours = 12;
            }
            const amOrPmEnd = (new Date(date).getHours() < 12) ? " AM" : " PM";
            return date.getMonth()+ "/"+(date.getDate()+1)+ "/"+date.getFullYear()+ ", "+hours+ ":"+date.getMinutes()+" "+amOrPmEnd;
        }
    }
</script>

<style >
    .commentMC {
        display:flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        margin-top: 2%;
    }
    .title {
      color: rgba(0, 0, 0, 0.87);
      font-size: 0.875rem;
      font-family: "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      line-height: 1.5;
      letter-spacing: 0.01071em;
    }
    .comment {
      display:flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: flex-start;
      border:none 1px #CCCCCC;
      width:100%;
    }
    .listCell {
      border: 1px solid #000;
      border-radius: 4px;
      background-color: #f1f1f1 !important;
      align-items: flex-start;
      margin-bottom: 5px;
      min-width: 420px;
      box-shadow: 2px 2px #888 !important;
      text-align: left;
      max-width: 400px;
      display: flex;
      justify-content: center;
      flex-direction: column;
      padding: 10px
    }
    .dateDivHolder {
      display: flex;
      justify-content: center;
      flex-direction: row;
    }
    .circleStyle {
      border: 1px solid #000 !important;
      border-radius: 30px !important;
      width: 50px !important;
      height: 50px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 30px !important;
      box-shadow: 2px 2px #888 !important;
      background-color: #f1f1f1 !important;
      padding-left: 20px !important;
      padding-right: 20px !important;
      margin-top: 10px !important;
    }
    .dateTxtCls {
      font-size:12px;
      margin-left: -115px;
      margin-top: 15px;
    }
</style>
