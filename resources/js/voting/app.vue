<template>
    <div class="i_position-fixed">
        <button class="i_trigger_btn i_text-white" @click="toggleDisplay">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32">
                <path d="M32 12.408l-11.056-1.607-4.944-10.018-4.944 10.018-11.056 1.607 8 7.798-1.889 11.011 9.889-5.199 9.889 5.199-1.889-11.011 8-7.798z" fill="#ffffff"></path>
            </svg>
        </button>

        <div class="i_dialog i_box-shadow-1" v-if="isVisible">
        	<!-- <iframe allowfullscreen="" name="intercom-messenger-frame" title="Intercom live chat" data-intercom-frame="true" role="dialog" src="data:text/html;charset=utf-8,<html><body><h2>Hello, World!</h2><p>This is some sample content inside an iframe.</p></body></html>"></iframe> -->

            <iframe allowfullscreen="" name="intercom-messenger-frame" title="Intercom live chat" data-intercom-frame="true" role="dialog" :src="src"></iframe>


        	<!-- <iframe src="data:text/html;charset=utf-8,<html><body><h2>Hello, World!</h2><p>This is some sample content inside an iframe.</p></body></html>"></iframe> -->
        </div>


    </div>
</template>
<script>
    export default {
         props: {
            path: {
                type: String,
                required: true
            }
        },
    	data() {
    		return {
                src: this.path + '/app',
    			isVisible: false
    		};
    	},
        mounted() {

            console.log("The trackerId", this.path); // "someid"
        },

    	methods: {
    		 toggleDisplay() {
      			this.isVisible = !this.isVisible;
    		}
    	}

	}
</script>
<style type="text/css" scoped>
.i_p-3 {
    padding: 30px;
}

.i_bg-primary {
    background-color: #69d2e7;
}

.i_position-fixed {
    position: fixed;
    z-index: 2147483004;
    padding: 0 !important;
    margin: 0 !important;
    border: none;
    bottom: 80px;
    right: 20px;
    max-width: 48px;
    max-height: 48px;
    height: 48px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.06), 0 2px 32px 0 rgba(0, 0, 0, 0.16);
    transition: transform 167ms cubic-bezier(0.33, 0.00, 0.00, 1.00);
    box-sizing: content-box;
}

.i_trigger_btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 1px solid #88cff1;
    background: #90d4f4;
}

.i_trigger_btn:hover {
    transition: transform 250ms cubic-bezier(0.33, 0, 0, 1);
    transform: scale(1.1);
}

.i_trigger_btn:active {
    transform: scale(0.85);
    transition: transform 134ms cubic-bezier(0.45, 0, 0.2, 1);
}

.i_text-white {
    color: #ffffff;
}

.i_dialog {
    border-radius: 15px;
	position: absolute;
    bottom: 80px;
    right: 20px;
    width: 350px;
    background: white;
    overflow: hidden;
    height: 50vh;
}

.i_dialog iframe {

 border: none;
 width: 100%;
 height: 100%;

}

.i_box-shadow-1 {
	box-shadow: rgba(0, 0, 0, 0.16) 0px 5px 40px;
}

</style>
