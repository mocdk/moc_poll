function Poll(root){
    var self = this;
    self.root = root;
    self.reply = null;
    self.pollId = 0;
    self.resultmode = "simple";
    self.vote = function(){
        if(self.reply){
            url = 'index.php?type=500&pluginName=pi1&extensionName=mocpoll&tx_mocpoll_pi1[action]=vote&tx_mocpoll_pi1[controller]=Poll&tx_mocpoll_pi1[reply]='+
								self.reply+
								'&tx_mocpoll_pi1[pollId]=' + self.pollId +
								'&tx_mocpoll_pi1[resultmode]=' + self.resultmode; 
            jQuery(".content",self.root).load(url, function(response, status, xhr) {
                if (status == "error") {
                    //console.log(xhr.statusText + ' ' + xhr.status);
                }
                else{
                    //console.log(status);
            //      jQuery(".content",self.root).addClass("results");
                }
            });
        }
    };
    
    self.init = function() {
    	self.pollId = jQuery(self.root).attr("smk:pollId");
    	self.resultmode = jQuery(self.root).attr("smk:resultMode");
	    jQuery('.vote-button',self.root).click(function(){
	        self.vote();
	    });
	    jQuery('.reply',self.root).bind('change', function(){
	        self.setReply(this.value);
	    });
    	
	};
	
	//console.log(jQuery('.reply',self.root));
	self.init();
	
	self.injectPollId = function (pollId){
		self.pollId = pollId;
	};
	self.setResultMode = function(resultmode) {
		self.resultmode = resultmode;	
	};

    self.setReply = function(reply){
        self.reply = reply;
    };
}