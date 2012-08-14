/*!
 * ws:combo JavaScript Control v1.0.2
 * Copyright 2011,2012 Ondrej Urik
 *
 * Date: January 2 2012
 *
 * This library is documented using JSDoc format.
 *
 * Requires jQuery
 * http://jquery.com/
 */

/**
 * @namespace Ws framework base namespace. This namespace is exposed so it can be globally accessible.
 */
var Ws={};

// ws initialisation
(function($){
	
	// local enclosure variables used for ws:combo
	var
		// Document base path. Used for resolving relative paths.
		ws_base = ($('base').attr('href')||(''+location)).split('?')[0].split('#')[0].replace(/\/[^\/]*$/, '/'),
		// Full canonical path to this javascript file.
		ws_path = (function(a){
			// resolve path
			a=(''+$('script[src*="ws-combo"]:last').attr('src')).split('?')[0].split('#')[0].replace(/\/[^\/]*$/, '/');
			// update path
			if(!/^[a-z]+:\/\//i.test(a))
				a=(ws_base+a).replace(/([^:])\/{2,}/g, '$1/');
			return a;
		})(),
		// Determines if the connection is secure.
		ws_ssl = ('https:'==document.location.protocol),
		// Preloads an image.
		ws_loadImg = function(s) {
			if(!ws_loadImg.cache)ws_loadImg.cache={};
			if(ws_loadImg.cache[s])return;
			ws_loadImg.cache[s]=$('<img />').attr('src',s);
		},
		// Removes whitespace (or other characters) from the beginning and end of a string.
		ws_trim = function(s,c) {
			if(!c)c='\\s\\xA0';
			else c=(''+c).replace(/[\.\*\+\?\|\(\)\{\}\[\]\\]/g, '\\$&');
			return (''+s).replace(new RegExp('^['+c+']+|['+c+']+$','g'),'');
		},
		// Escape special characters to HTML entities.
		ws_escape = function(s,a) {
			s=(''+s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
			if(a)s=s.replace(/"/g,'&quot;').replace(/'/g,'&#039;').replace(/`/,'&#096;');
			return s;
		},
		// Get the scrollbar width.
		ws_sb = function() {
			if(!ws_sb.v){
				var d=$('<div style="position:absolute;left:-9999px;top:-9999px;width:200px;height:150px;overflow:scroll;visibility:hidden"><p style="padding:0;margin:0;display:block;height:200px">&nbsp;</p></div>');
				$('body').prepend(d);
				ws_sb.v=200-d.get(0).childNodes[0].offsetWidth;
				d.remove();
			}
			return ws_sb.v;			
		},	
		// get the content box
		cBox=function(a){
			var p={border:[],padding:[]},pv=['Top','Right','Bottom','Left'],i,f=function(s){
				s=parseInt(s);
				return isNaN(s)?0:s;
			};
			for(i=0;i<pv.length;i++)
			{
				p.border[i]=f(a.css('border'+pv[i]+'Width'));
				p.padding[i]=f(a.css('padding'+pv[i]));
			}
			p.width=a.innerWidth();
			return p;
		},
		// get or set the selection
		cSel=function(a,r){
			var e=a.get(0),tr,er,len,nv;
			if(!e)return null;
			if(!r)r=null; // get selection
			// standard DOM selectionStart support
			if(typeof e.selectionStart != 'undefined'){
				if(!r)r={start:e.selectionStart,end:e.selectionEnd};
				else {
					e.selectionStart = r.start;
					e.selectionEnd = r.end||r.start;
					return;
				}
			// ie support
			} else if (e.createTextRange&&document.selection&&document.selection.createRange) {						
				len = e.value.length;
				nv = e.value.replace(/(\r\n|\n\r|\r)/g, '\n');
				tr = e.createTextRange();

				// set range
				if(r){
					tr.collapse(true);
					if(r.start==r.end)
						tr.move('character', r.end);
					else {
						tr.moveStart('character', r.start);
						tr.moveEnd('character', r.end);
					}
					tr.select();
					return;
				}
			
				// get range
				r = document.selection.createRange();								
				tr.moveToBookmark(r.getBookmark());
				er = e.createTextRange();
				er.collapse(false);
				r={};
				if (tr.compareEndPoints('StartToEnd', er) > -1)
					r.start=r.end=len;
				else {				
					r.start = -tr.moveStart('character', -len);
					r.start += nv.slice(0, r.start).split('\n').length - 1;
					if (tr.compareEndPoints('EndToEnd', er) > -1)
						r.end = len;
					else {
						r.end = -tr.moveEnd('character', -len);
						r.end += nv.slice(0, r.end).split('\n').length - 1;
					}
				}			
			}
			return r;
		},
		// device is touch powered
		iOS = (function(){try{document.createEvent('TouchEvent');return true;}catch(e){return false;}})(),
		// initial dd index
		Dropdown_index = 1,
		// global base class
		cn = 'ws-dropdown',
		// mousewheel fix
		mw_types=['DOMMouseScroll','mousewheel'],
		mw_handler=function(event) {
			var e = event||window.event, a = [].slice.call(arguments, 1), delta = 0, returnValue = true, deltaX = 0, deltaY = 0, undefined;
			event = $.event.fix(e);
			event.type = "mousewheel";
	
			// resolve delta
			if(e.wheelDelta)delta=e.wheelDelta/120;
			if(e.detail)delta=-e.detail/3;	
			deltaY = delta;
	
			// gecko
			if (e.axis !== undefined && e.axis === e.HORIZONTAL_AXIS) {
				deltaY = 0;
				deltaX = -1*delta;
			}
	
			// webkit
			if(e.wheelDeltaY !== undefined)deltaY = e.wheelDeltaY/120;
			if(e.wheelDeltaX !== undefined)deltaX = -1*e.wheelDeltaX/120;
	
			// add arguments
			a.unshift(event, delta, deltaX, deltaY);
	
			// call the handler
			return ($.event.dispatch||$.event.handle).apply(this, a);
		};
	for(var i=mw_types.length;$.event.fixHooks&&i;)
		$.event.fixHooks[mw_types[--i]] = $.event.mouseHooks;
	$.event.special.mousewheel={
		setup:function(){
			if(this.addEventListener)
				for(var i=mw_types.length;i;)
					this.addEventListener(mw_types[--i],mw_handler,false);
			else
				this.onmousewheel=mw_handler;
		},
		teardown:function(){
			if(this.removeEventListener)
				for(var i=mw_types.length;i;)
					this.removeEventListener(mw_types[--i],mw_handler,false);
			else
				this.onmousewheel = null;
		}
	};

	// preload required css
	// Note: we don't use createElement because it doesn't block the css loading and we need the below css
	// for correctly calculating the control's size. Also make sure it has not been loaded yet.
	if (!$('link[href*="ws-combo.css"]').length) {
		var css = '<link rel="stylesheet" type="text/css" href="'+ws_escape(ws_path,1)+'ws-combo.css" />';
		if ($.isReady) $('head').append(css);
		else document.write(css);
	}

	/**
	 * Creates a new standalone combo.
	 * @param {Object} p Combo parameters.
	 * @returns {Ws.Combo} The instance of the combo object.
	 */
	$.wscombo=function(p){return new Ws.Combo(p);};

	/**
	 * Substitues a <select /> tag with a combo.
	 * @param {Object} p Combo parameters.
	 * @returns {jQuery} Reference to current jQuery object.
	 */
	$.fn.wscombo=function(p){
		// ensure params
		if(!p)p={};
		// delete parent to prevent
		delete p.parent;
		var combos = [];
		this.each(function(i,e,l,po,lx,lb){
			po=$.extend({}, p);
			if(e.tagName=='SELECT'){
				po.items=[];
				po.id=e.id;
				po.select=e;
				po.name=e.name;
				if(!('selectedIndex' in po))po.selectedIndex=e.selectedIndex;
				l=e.options.length;
				i=-1;
				while(++i<l){
					lx=e.options[i].parentNode;
					if(lx.tagName=='OPTGROUP'&&lx.label!==lb){
						lb=lx.label;
						if(po.selectedIndex>-1)po.selectedIndex++;
						po.items.push({l:lb});
					}
					if(e.options[i].text=='-'&&e.options[i].disabled)
						po.items.push('-');
					else {
						var img={
							url:$(e.options[i]).css('backgroundImage'),
							x:(''+($(e.options[i]).css('backgroundPosition')||e.options[i].style.backgroundPosition)).split(' ')
						};
						if(!img.url||img.url=='none')img=null;
						else {
							img.url=ws_trim(ws_trim(img.url).replace(/(^url\(|\)$)/ig,''), '"\'');
							if (isNaN(img.y=parseInt(img.x[1])))img.y=0;
							if (isNaN(img.x=parseInt(img.x[0])))img.x=0;
						}
						po.items.push({
							t:e.options[i].text,
							v:e.options[i].value,
							d:e.options[i].disabled,
							i:img
						});
					}
				}
			} else
				po.parent = e;
			combos.push(po);
		});
		while(combos.length)$.wscombo(combos.shift());
		return this;
	};

	/** WS FRAMEWORK COMPONENTS **/

	// Ws.Dropdown is a base class for all dropdowns
	/**
	 * @class Base class for Ws.Dropdown objects.
	 */
	Ws.Dropdown=function(){};
	// Shorthand for prototype.
	Ws.Dropdown.fn=Ws.Dropdown.prototype;
	/**
	 * Initializes the dropdown object.
	 * @param {Object} p Additional parameters.
	 */
	Ws.Dropdown.fn.init=function(p){
		// increment so we know how many are there on screen
		Dropdown_index++;

		// common parameters passed
		//     id - the id of the item
		//     name - name of the item
		//     maxHeight - maximum height of the dropdown area
		//     className - the base class name to use - this needs to be set in oninit if not provided by user
		//     text - optional text to display in the textarea
		//     parent - the parent to add the dropdown to
		//     select - the select control to substitute with the dropdown
		//     value - optional default value
		//     img - true to show the img control
		//     width - the width of the text field

		// resolve params
		if(!p)p={};
		if(!p.id)p.id='wsDropdown'+Dropdown_index;	
		if(typeof p.maxHeight != 'number')p.maxHeight=200;
		if(typeof p.text != 'string')p.text='(select)';
		this.oninit(p);

		// html code to be appended to the parent
		// the base64 code stands for 1x1px wide transparent gif
		// note that old IE 6 doesnt support this
		var cc=this,ip,
			t=$.browser.msie&&$.browser.version<8?('http'+(ws_ssl?'s':'')+'://ws-cdn.appspot.com/lib/t.gif'):'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==',
			h='<div id="'+p.id+'_wscombo" class="'+cn+'" style="visibility:hidden"><img src="'+t+'" width="16" height="16" class="dropdown-img" style="-moz-user-select:none;-khtml-user-select:none;-webkit-user-select:none;user-select:none" unselectable="on" onselectstart="return false;" />'
			 +'<input class="dropdown-txt" id="'+ws_escape(p.id,1)+'" type="text" style="width:10px" />'
			 +'<img src="'+t+'" width="16" height="16" class="dropdown-btn'+(p.className?' '+p.className+'-btn':'')+'" style="-moz-user-select:none;-khtml-user-select:none;-webkit-user-select:none;user-select:none" unselectable="on" onselectstart="return false;" /><input type="hidden" /></div>';
		if(p.select)$(p.select).replaceWith(h);
		else if(p.parent)$(p.parent).append(h);
		else if(!$.isReady)document.write(h); // only if document not ready
		else throw 'ws:combo parent element not specified';

		// native methods (not defined via prototype)
		/**
		 * Gets the bounding rect of the dropdown area and scroll positions to properly determine whether the
		 * popup container will be below or above the main container. See Ws.Dropdown.fn.show() for usage.
		 * @returns {Object} The bounding rect with following properties: y,cy,scroll.y,scroll.cy
		 */
		cc.bounds=function(){
			var b={};

			// get the document relative top position and the outer height
			b.y=cc.div.offset().top;
			b.cy=cc.div.outerHeight(0);

			// setup scroll property and get the scroll top position and scroll height
			b.scroll={y:0,cy:0};

			if (self.innerHeight) b.scroll.cy = self.innerHeight;
			else if (document.documentElement&&document.documentElement.clientHeight) b.scroll.cy = document.documentElement.clientHeight;
			else if (document.body) b.scroll.cy = document.body.scrollHeight;

			if (window.pageYOffset) b.scroll.y = window.pageYOffset;
			else if (document.documentElement&&document.documentElement.scrollTop) b.scroll.y = document.documentElement.scrollTop;
			else if (document.body) b.scroll.y = document.body.scrollTop;
			else if (window.scrollTop) b.scroll.y = window.scrollTop;

			return b;
		};

		/**
		 * Runs a parameter method.
		 * @param {String} t The method to run.
		 */
		cc.on=function(t){
			(p['on'+t]||function(){}).apply(cc, [].slice.call(arguments, 1));
		};

		// resolve related items
		//  cc.input - input where the text value is stored
		//  cc.div - the container that holds the entire dropdown
		//  cc.hidden - the input that holds the value
		//  cc.img - the img that shows the left icon (e.g. for a combo with images)
		//  cc.btn - the button that can be clicked to display the dropdown area
		cc.index=Dropdown_index;
		cc.input=$('#'+p.id);
		cc.div=cc.input.parent();
		cc.hidden=cc.div.children('input[type=hidden]');
		cc.img=cc.div.children('.dropdown-img');
		cc.btn=cc.div.children('.dropdown-btn');
		if(p.name)cc.hidden.attr('name',p.name);
		cc.input.val(p.text||'');
		cc.hidden.val(p.value||'');
		if(!p.img)cc.img.css({display:'none'});
		cc.input.attr('readonly','readonly').css({cursor:'default'});
		cc.img.attr('class', 'dropdown-img dropdown-img-empty');

		// add specific classes per browser
		if($.browser.msie)
			cc.div.addClass('ws-ie'+Math.floor($.browser.version));

		// perform post initialisation tasks for the params
		cc.settings=p;
		cc.onsetup(p);

		// render the items - we also need to include the text to properly recalc the size for auto
		// the frame should be rendered only once !!!
		// why in table? well because only table can return correct width in old browsers, as other content usually overlaps
		h=cc.render(p);
		h='<div class="'+cn+'-popup"><table border="0" cellpadding="0" cellspacing="0" class="'+cn+'-popup-inner"><tr><td>'+h+'</td></tr></table></div>';
		cc.div.append(h);
		cc.ui=cc.div.children('.'+cn+'-popup');

		// correct class update for the container div
		cc.__mkc=function(){		
			cc.div.removeClass(cn+'-focused '+cn+'-hover '+cn+'-disabled');		
			if(cc.disabled)return cc.div.addClass(cn+'-disabled');
			if(cc.expanded)return;
			if(cc.focused)cc.div.addClass(cn+'-focused');
			if(cc.hover)cc.div.addClass(cn+'-hover');
		};

		// bind events
		ip=cc.input.get(0);
		cc.input.focus(function(){
			// focus - update the container class
			// also try to select the entire textbox contents so the caret is not blinking
			// NOTE: latest Firefox (and maybe some other browsers) supports transparent selection so this can be effectively hidden by CSS
			cc.focused=1;	
			cc.__mkc();	
			if(ip.select())ip.select();
		}).blur(function(){
			// blur - update the container class
			cc.focused=0;
			cc.__mkc();
		}).bind('mousedown', function(e){
			// left button clicked in the input area
			if(e.button<2)
			{
				// properly focus and display popup
				if(cc.animating){
					e.preventDefault();
					return false;
				}
				if(!cc.focused)ip.focus();
				if(ip.select)ip.select();
				if(cc.expanded)cc.hide();
				else cc.show();
				e.preventDefault();
				// post select for old IE
				if(cc.focused&&document.all&&ip.select)
					ip.select();
				return false;
			}
		}).bind('keydown keyup', function(e){		
			// key pressed and released, process it
			// e.cancel => prevent default action
			// e.processed => do not process further within Ws.Dropdown class
			cc.onkey(e);
			if(e.keyCode==27)e.cancel=1;
			if(e.type=='keyup')e.processed=1;
			if (!e.processed)
			{
				// prevent selection (arrows movement, pgup, pgdn)
				if(-1<$.inArray(e.keyCode, [33,34,35,36,37,38,39,40]))
					e.cancel=true;
				// arrow down - show the dropdown
				if(e.keyCode==40 && !cc.expanded)
				{
					e.cancel=true;
					cc.show(0,1);
				}
			}
			// default action cancelled
			if(e.cancel)
			{
				// REMOVE: e.stopPropagation();
				e.preventDefault();
				return false;
			}
		});

		// user mouse hovered over the container
		cc.div.mouseover(function(){		
			cc.hover=1;
			cc.__mkc();
		}).mouseout(function(){
			cc.hover=0;
			cc.__mkc();
		});

		// bind additional events
		cc.bind(p);

		// user clicked inside the container (not in text input)
		cc.div.find('.dropdown-img, .dropdown-btn').bind('mousedown', function(e){
			if(e.button>=2)return;
			if(cc.animating){
				e.preventDefault();
				return false;
			}
			if(!cc.focused){
				ip.focus();
				if(ip.select)ip.select();
			}
			if(cc.expanded)cc.hide();
			else cc.show();
			// e.returnValue=e.originalEvent.returnValue=false;
			// if(e.stopPropagation)e.stopPropagation();
			if(e.preventDefault)e.preventDefault();
			// if(e.stop)e.stop();
			return false;
		});

		// mark default as disabled
		if(p.disabled)
			cc.disable(1);

		// initialize layout when ready
		cc.resize=function(){
			// show it
			cc.div.css('visibility', 'visible');

			// calculate width of the txt if not specified
			if(!p.width||p.width=='auto'||p.autoWidth){
				p.autoWidth=1;
				cc.ui.css({left:'-9000px',top:'-9000px',visibility:'hidden',display:'block',width:'1%'});
				p.width = cc.width(p);
				cc.ui.css({display:'none'});
			}

			// adjust to maxWidth
			if(!p.maxWidth)
				p.maxWidth=cc.div.parent().width();
			if (p.maxWidth>50&&p.width>p.maxWidth)
				p.width=p.maxWidth;
			cc.input.css('width',p.width+'px');
		};
		
		// make sure it is resized when document layout available
		if(!p.parent)
			$(cc.div.parent()).ready(cc.resize);
		else
			$(p.parent).ready(cc.resize);
	};
	/**
	 * Disable the dropdown.
	 * @param {Bool} [d] True to disable; false otherwise. The default is true.
	 */
	Ws.Dropdown.fn.disable=function(d){
		if(!arguments.length)d=1;
		var cc=this,tb=cc.input.get(0);
		cc.disabled=d?1:0;
		if(d){cSel(cc.input,{start:0,end:0});tb.blur();}
		tb.disabled=d?1:0;
		cc.__mkc();
		return cc;
	};
	/**
	 * Enable the dropdown.
	 */
	Ws.Dropdown.fn.enable=function(){
		this.disable(0);
	};
	/**
	 * Virtual method that returns the dropdown area rendered. See Ws.Combo.fn.render for implementation.
	 * @returns {String} The html to append to the container DIV.
	 */
	Ws.Dropdown.fn.render=function(){};
	/**
	 * Virtual method that returns the calculated width of the input text if user does not explicitly set the width.
	 * @returns {Number} The width in pixels of the textfield.
	 */
	Ws.Dropdown.fn.width=function(){}

	/**
	 * Show the dropdown container.
	 * @param {Function} [fEnd] optional function to run when the dropdown container has been fully expanded.
	 * @param {Bool} [byKey] optional, indicates if keystroke was used to show the combo.
	 */
	Ws.Dropdown.fn.show=function(fEnd,byKey){
		var cc=this,p=cc.settings,px,a,uin,d=160;

		// already expanded, thus do not run the show logic
		if(cc.expanded||cc.disabled)return cc;

		// if we have topmost that is other then self then hide it
		if(Ws.Dropdown_tm&&Ws.Dropdown_tm!=cc)
			Ws.Dropdown_tm.hide();

		// mark as expanded and set topmost
		cc.expanded=cc.animating=1;
		Ws.Dropdown_tm=cc;

		// for calculation
		// visibility must be first so no overlay is shown as JS interprets the properties randomly
		cc.ui.css({visibility:'hidden'}).css({left:'-9000px',top:'-9000px',display:'block'});
	
		// get border size to properly determine width of the dropdown container
		px=parseInt(cc.div.css('borderLeftWidth'));
		if (isNaN(px)) px=0;
	
		// get the proper width
		// detect if width changed
		if(!cc.xw||cc._iv)
		{		
			// var xwp=cc.xw;

			// event resize before shown
			// TODO: adjust to proper width if needed with cc._iv
			cc._iv=0;
			cc.xw=cc.onresize(p)+(px*2);

			// cc.xw specifies the min width the popup area can get
			// the min width must be at least the width of the parent div
			// check old IE to support correct border
			cc.xw=Math.max(cc.div.outerWidth(), cc.ui.outerWidth(), cc.xw);
			if($.browser.msie&&$.browser.version<8)cc.xw-=(px*2);
			// following happens only if reduced
			// if(xwp&&xwp<cc.xw)cc.xw=xwp;
		}		

		// determine if shown above or below
		if(px>0)px='-'+px;
		a={opacity:1,height:0},b=cc.bounds(),css={
			left:px+'px',
			top:cc.div.height()+'px',
			width:cc.xw+'px',
			display:'block',
			visibility:'visible',
			opacity:0,
			height:'1px'
		};

		if(!cc.height)cc.height=cc.ui.outerHeight();

		a.height=b.h=cc.height;
		p.flip=0;
		if(b.h+b.y+b.cy+4>b.scroll.cy+b.scroll.y&&b.y-b.h>4&&b.h+4<b.scroll.cy){
			p.flip=1;
			css.top=0;
			a.top=-b.h;
		}

		// setup inner dropdown div width properly
		// if the dropdown is above the main container perform flip
		cc.ui.css({width:cc.xw+'px'});
		uin=cc.ui.children('table');
		uin.css({width:'100%'});

		// call event before shown
		cc.onbeforeshow(p,byKey);

		// check if flip needs to be applied
		if(!p.flip)
			uin.css('marginTop','-'+b.h+'px').animate({marginTop:0},d);

		// setup correct class for the main container and set proper styles
		if(typeof cc._zi == 'undefined')cc._zi=cc.div.css('zIndex');
		cc.__mkc();
		cc.div.addClass(cn+'-'+(p.flip?'above':'below')).css({zIndex:8094});
		cc.ui.css(css);
		cc.ui.animate(a,d,function(){
			if(cc.iefr){
				cc.ui.css('height',(b.h-2)+'px');
				cc.iefr.css('height',(b.h-2)+'px');
			}
			else
				cc.ui.css('height','auto');
			if(p.flip)
				cc.ui.css({top:'-'+cc.ui.outerHeight()+'px'});
			cc.animating=0;
			if(fEnd)fEnd();					
		});

		return cc;
	};

	/**
	 * Hide the dropdown container.
	 */
	Ws.Dropdown.fn.hide=function(){
		var cc=this,p=cc.settings;
		if(!cc.expanded)return cc;
		cc.animating=1;
		cc.ui.animate({opacity:0},120,function(){
			cc.div.css({zIndex:cc._zi}).removeClass(cn+'-above '+cn+'-below');
			cc.ui.css('display','none');		
			cc.expanded=cc.animating=0;
			if(Ws.Dropdown_tm==cc)Ws.Dropdown_tm=null;
			cc.__mkc();
			cc.onhide(p);
		});
		return cc;
	};

	// methods that children classes need to override.
	Ws.Dropdown.fn.oninit=Ws.Dropdown.fn.onsetup=Ws.Dropdown.fn.onresize=Ws.Dropdown.fn.onbeforeshow=Ws.Dropdown.fn.onhide=Ws.Dropdown.fn.onkey=Ws.Dropdown.fn.bind=function(){};

	// mouseup event to catch clicked outside the dropdown so we can safely hide it
	$(document).bind(iOS?'touchend':'mouseup',function(e){
		if(e.button==2||!Ws.Dropdown_tm)return; // ignore rightcick or if topmost not visible
		var p=Ws.Dropdown_tm.div.get(0);
		e=e.target;
		while(e){		
			if(e==p)return; // clicked into topmost
			e=e.parentNode;
		}
		Ws.Dropdown_tm.hide();
	});

	/**
	 * Static method used to create an object that derives from Ws.Dropdown.
	 */
	Ws.Dropdown.extend = function(){
		// placeholder constructor
		function c() {
			if(this.init)
				this.init.apply(this, arguments);
		};
		c.prototype = c.fn = new this();
		c.prototype.constructor = c;
		c.extend = arguments.callee;
		return c;
	};

	/** Combo **/
	/**
	 * @class Combo input item.
	 */
	Ws.Combo=Ws.Dropdown.extend();
	/**
	 * Creates the combo dropdown html code.
	 * @param {Object} p The combo settings.
	 * @returns {String} The html string for the combo dropdown container.
	 */
	Ws.Combo.fn.render=function(p){
		var items=p.items,
			cn=p.className,
			l=items.length,j=-1,h=p.maxHeight,im,i,t,pt=ws_escape(p.text),
			hd=$('<div />'),
			html='<div class="'+cn+'-items" style="height:25px">'
				+'<ul id="'+ws_escape(p.id,1)+'_Items" style="-moz-user-select:none;-khtml-user-select:none;-webkit-user-select:none;user-select:none" unselectable="on" onselectstart="return false;">';	
		if(l<=0)html+='<li class="'+cn+'-empty">&nbsp;</li>';
		while(++j<l) {
			i=items[j];
			if(i=='-')items[j]=i={s:1};
			if(typeof i == 'string')items[j]=i={t:i};
			h=i.h||i.html;t=i.t||i.text;
			if(!t&&h)i.t=t=hd.html(ws_trim(h.replace(/<small(.*?)\/small>/gi,'').replace(/(<\/|<)[a-z]+[^>]*>/gi, ''))).text();
			if(!h)h=ws_escape(t||'');
			if(i.s||i.separator)
				html += '<li class="'+cn+'-separator"'+(iOS?'':' onmouseover="Ws.Combo.'+p.id+'.hl('+j+');"')+'><s>&nbsp;</s></li>';
			else if(i.l||i.label)
				html += '<li class="'+cn+'-label"'+(iOS?'':' onmouseover="Ws.Combo.'+p.id+'.hl('+j+');"')+'><b>'+ws_escape(i.l||i.label)+'</b></li>';
			else {
				pt+='<br />'+ws_escape(t);
				html+='<li class="'+cn+'-'+(i.d?'disabled':'out')+'"';
				if(i.d||i.disabled){if(!iOS)html+=' onmouseover="Ws.Combo.'+p.id+'.hl('+j+');"';}
				else html+=' onmouseover="Ws.Combo.'+p.id+'.highlight(this,'+j+');"';
				if(im=(i.i||i.img)){
					if(typeof im == 'string')
						im={x:0,y:0,url:im};
					if(!im.url)im.url=p.img;
					if(!('x' in im))im.x = 0;
					if(!('y' in im))im.y = 0;
					if(typeof im.x == 'number' && im.x) im.x += 'px'; 
					if(typeof im.y == 'number' && im.y) im.y += 'px';
					i.im=im='url(\''+im.url+'\') no-repeat '+im.x+' '+im.y;
					h = '<span class="wsc-i" style="background:'+im+'">&nbsp;</span>'+h;
				}
				html+='><span class="wsc-h">'+h+'</span></li>';
			}
		}
		if(!p.width||p.width=='auto'||p.autoWidth)
			pt='<div class="ws-dropdown-tmptext"><div>'+pt+'</div></div>';
		else
			pt='';
		html += '</ul>'+pt+'</div>';
		if(p.combo||p.reset)
		{
			h=p.reset;l=p.combo;
			if(typeof h != 'string')h='Reset';
			if(typeof l != 'string')l=(p.reset?'or e':'E')+'nter a new value:';
			if(h&&l)l=' '+l;
			html+='<div class="'+cn+'-footer"><span>';
			if (p.reset)
				html+='<a href="#reset-'+p.id+'" onclick="Ws.Combo.'+p.id+'.reset();return false;" class="'+cn+'-reset">'+ws_escape(h)+'</a>';
			if (p.combo)
				html+=ws_escape(l)+'</span><br /><input onfocus="Ws.Combo.'+p.id+'.oncombo(this);" id="'+p.id+'_cb" type="text"'+(p.maxLength?' maxlength="'+p.maxLength+'"':'')+' /><div onmouseover="Ws.Combo.'+p.id+'.oncombohover(this);"></div>';
			else
				html+='</span>';
			html+='</div>';
		}
		return '<div class="ws-combo-itop"><s></s></div>'+html+'<div class="ws-combo-itop"><s></s></div>';
	};

	/**
	 * Initialise the combo input.
	 * @param {Object} p The combo settings.
	 */
	Ws.Combo.fn.oninit=function(p){
		// if no class set, then use default
		if(!p.className)p.className='ws-combo';
		// if no items set then create empty array
		if(!p.items)p.items=[];
		// add to DOM cache for easy reference
		if(Ws.Combo[p.id])
			throw "ws:combo id '"+p.id+"' is already used";
		else if(!/^[a-z]+[0-9a-z_\-]*$/i.test(p.id))
			throw "ws:combo id '"+p.id+"' is not valid, use characters [0-9a-z_-]";
		Ws.Combo[p.id] = this;
		// preload base map if specified
		if (typeof p.img == 'string')		
			ws_loadImg(p.img);
	};

	/**
	 * Perform post initialisation task.
	 * @param {Object} p The combo settings.
	 */
	Ws.Combo.fn.onsetup=function(p){
		var cc=this,v,vc,cn=p.className;

		// cleanup
		cc.he=function(){
			if(p.combo&&cc._wsc){		
				cc._wsc.value='';
				cc._wsd.style.display='none';
			}
			if(cc._oldW&&cc._oldW!=parseInt(cc.input.get(0).style.width)){			
				cc.input.css({width:cc._oldW+'px'});
				cc._iv=1;
			}
		};

		// resolve value
		// if value set and selectedIndex is -1 then try to find the value
		if (isNaN(cc.selectedIndex=p.selectedIndex))cc.selectedIndex=-1;
		cc.oldJ=-1;
		if(typeof p.value != 'undefined'&&cc.selectedIndex==-1){
			var i=p.items.length;
			while(i--){
				v=p.items[i];
				if(v.s||v.separator||v.l||v.label)continue;
				// note: disabled and hidden items are processed too !
				// get the value, if value not found then use the text
				vc=v.v||v.value;			
				if(typeof vc == 'undefined')
					vc=v.t||v.text;			
				// if value found then setup the selectedIndex and jump out of the while cycle
				if(vc == p.value)
				{
					cc.selectedIndex=i;
					break;
				}
			}
		}
		if(cc.selectedIndex>=p.items.length)
			cc.selectedIndex=p.items.length-1;

		// additional native methods
		// if user moves mouse over the right combo button
		cc.oncombohover=function(d){
			var $d=$(d);
			$d.fadeTo(100,1).addClass('wsc-hover');
			if(!d._wsc){
				d._wsc=1;
				$d.mouseout(function(){
					$d.fadeTo(100,.5).removeClass('wsc-hover');
				}).click(function(e){cc.hc(e);});
			}
		}
		// store the currently highlighted item index
		cc.hl=function(j){if(!cc.ui_anim)cc.oldJ=j;};
		// highlight the item
		cc.highlight=function(li,j,scroll){
			// if animating or same index selected then do not process further
			if(cc.ui_anim||(scroll&&cc.oldJ==j))return;
			// get the item to update
			// set the appropriate classname
			if(!li)li=cc.ui_li.get(j);
			if(!li._b)
			{
				li._b=1;
				$(li).bind('mouseout',function(){
					li.className=cn+'-out';
				}).bind('mouseup',function(e){
					if(e.button<2)cc.select(j);
				});
			}
			if(cc.oldLi&&cc.oldLi!=li)cc.oldLi.className=cn+'-out';
			li.className=cn+'-in';
			cc.oldLi=li;
			cc.oldJ=j;

			// if scroll requested (arrow up/down) then scroll the selected item in view
			if(scroll){
				var li=cc.ui_li.get(j),y=li.offsetTop,cy=li.offsetHeight,t=cc.ui_p.scrollTop(),nt=t,ty=cc.ui_p.height();
				if(y<t)nt=y-1;
				else if(y+cy>t+ty)nt=(y-ty+cy)-1;
				if(nt<0)nt=0;
				if(nt!=t){
					cc.ui_anim=1;
					cc.ui_p.animate({scrollTop:nt}, 150, function(){cc.ui_anim=0;});
				}
			}
		};	
	};

	/**
	 * Set the combo.
	 * @param {Object} p The combo parameters.
	 */
	Ws.Combo.fn.set=function(p){
		if(p instanceof Array)
			p={items:p};
		var cc=this,aw=0,cs=cc.settings.onselect;		
		if(!p)return cc;		
		for(var n in p)
			if($.inArray(n,['id','parent','select'])<0)
				cc.settings[n]=p[n];		
		if('items' in p){
			delete cc.settings.onselect;
			if('text' in p)
				cc.reset();
			cc.ui.remove();
			h=cc.render(cc.settings);
			h='<div class="'+cn+'-popup"><table border="0" cellpadding="0" cellspacing="0" class="'+cn+'-popup-inner"><tr><td>'+h+'</td></tr></table></div>';
			cc.div.append(h);
			cc.ui=cc.div.children('.'+cn+'-popup');			
			cc.oldJ=-1;
			cc.settings.onselect = cs;
			aw=1;
			cc._iv=1;
			cc.expanded=cc.animating=0;
			delete cc.xw;
			delete cc.ui_li;
			delete cc.height;
		}
		if('img' in p)
			cc.img.css({display:p.img?'':'none'});
		if('disabled' in p)
			cc.disable(p.disabled?1:0);
		if('selectedIndex' in p)
			cc.select(p.selectedIndex,1);
		if(p.width||p.autoWidth||p.maxWidth||aw)
			$(document).ready(cc.resize);
		return cc;
	};

	/**
	 * Insert an item(s) at the specified index.
	 * @param {Number} [i] The index to insert at. If not specified the item will be appended.
	 * @param {Object} a,a2,a3,... One or more items to insert.
	 */
	Ws.Combo.fn.insert=function(i){
		var cc=this,p=cc.settings.items.slice(0),a=[].slice.call(arguments,0);
		if(typeof i=='number')
			a=a.slice(1);
		else
			i=p.length;
		if(a.length == 1 && a[0] instanceof Array)
			a=a[0];
		a.unshift(i,0);
		p.splice.apply(p, a);
		return cc.set(p);
	};

	/**
	 * Remove one or more items at the specified index.
	 * @param {Number} i The index to remove at.
	 * @param {Number} n The number of items to remove.
	 */
	Ws.Combo.fn.remove=function(i,n){
		var cc=this,p=cc.settings.items.slice(0);
		if(n<1)n=1;
		p.splice(i,n);
		return cc.set(p);
	};

	/**
	 * Perform post-init binding.
	 */
	Ws.Combo.fn.bind=function(){
		var cc=this,p=cc.settings.onselect;

		// update to proper selected index so it is not outside bounds
		delete cc.settings.onselect;
		if(cc.selectedIndex>-1)
			cc.select(cc.selectedIndex);	
		else
			cc.reset();
		cc.settings.onselect = p;
	};

	/**
	 * Calculate the width of the input field if no explicit user width is provided.
	 * @return {Number} The width of the input field in pixels.
	 */
	Ws.Combo.fn.width=function(){
		// calculate the width of the text part
		var ui=this.ui,d=ui.find('.ws-dropdown-tmptext'),w=d.innerWidth()+(document.all?0:2);
		d.remove();
		return w;
	};

	/**
	 * Process combo text input events. This method is firstly called when the combo textbox is focused.
	 * @param {Object} tb The xombo textbox.
	 */
	Ws.Combo.fn.oncombo=function(tb){
		var cc=this,ip,v,i,ii,t,im,iv,p=cc.settings,r,d=tb.nextSibling;	
		tb._val='';
		// show the div btn on the right
		d.style.display=ws_trim(tb.value)?'block':'none';
		if(!tb._wsc)
		{
			tb._wsc=1;		
			cc._wsd=d;
			cc._wsc=tb;

			// function to validate the input
			var fVal = (typeof p.validate == 'function' ? p.validate : function(v){
				return (p.validate&&p.validate.test ? p.validate.test(v) : true);
			});

			// adjust for indexing
			ii=p.items.length;
			while(ii--){
				i=p.items[ii];
				i._lt=(i.t||i.text||'').toLowerCase();
			}

			// native action to set the combo item
			cc.hc=function(e){
				e.preventDefault();

				// check if value found
				if(!fVal(v=ws_trim(tb.value)) || v == '')return false;
				ip=v.toLowerCase();
				ii=p.items.length;
				im=0;
				iv={combo:v};
				while(ii--){
					i=p.items[p.items.length-ii-1];
					if(i.s||i.separator||i.l||i.label||i.d||i.disabled)continue;
					if(i._lt==ip){
						t=i.t||i.text||'';
						v=i.v||i.value||t;
						iv=i;
						im=i.im;
						tb.value = '';
						d.style.display='none';
						cc.selectedIndex=p.items.length-ii-1;
						break;
					}						
				}
				if(ii<0){t=tb.value;cc.selectedIndex=-1;}

				cc.input.val(cc.i_v=t).attr('class','dropdown-txt');
				cc.hidden.val(v);
				cc.img.css({background:im||''}).attr('class', 'dropdown-img'+(im?'':' dropdown-img-empty'));			
				if(cc.expanded){
					tb._wsc=2;
					cc.hide();
					ip=cc.input.get(0);
					ip.focus();if(ip.select)ip.select();
					tb._wsc=1;
				}

				// calculate the optional width and update the width
				var iw=cc._oldW||(cc._oldW=parseInt(cc.input.get(0).style.width)),
					$w=$($('body').prepend('<div class="ws-dropdown-tmptext" style="position:absolute;left:-9999px;top:-9999px">'+ws_escape(cc.input.val())+'</div>').get(0).childNodes[0]),w=Math.min(p.maxWidth, $w.innerWidth()+(document.all?0:2));
				$w.remove();
				// update width
				if(w>iw){
					cc.input.css({width:w+'px'});
					cc._iv=1;
				}

				cc.on('select', iv);
			}

			$(tb).blur(function(){
				if(ws_trim(tb.value)=='')d.style.display='none';
			}).keydown(function(e){
				// enter - set the value
				// make sure the form is not submitted so prevent default action
				if(e.keyCode==13){
					if(tb._wsc!=2)cc.hc(e);
					e.preventDefault();				
					return false;
				}
			}).keyup(function(e){
				v=ws_trim(tb.value);
				d.style.display=v?'block':'none';

				// enter - set the value
				// make sure the form is not submitted so prevent default action
				if(e.keyCode==13){
					e.preventDefault();				
					return false;
				}

				// special keys
				if(e.shiftKey||e.ctrlKey||e.altKey)return;

				// no change detected or empty string			
				v=v.toLowerCase();
				if (v == '' || tb._val == v || tb._val.length > v.length){
					tb._val = v;
					if(!fVal(ws_trim(tb.value)))$(d).addClass('wsc-invalid');
					else $(d).removeClass('wsc-invalid');
					return;
				}

				// set val and adjust
				tb._val = v;

				// try to substitute if caret is last
				r=cSel($(tb));
				if(r&&r.start==r.end&&r.start==tb.value.length){

					// should be in timeout ?
					ii=p.items.length;
					while(ii--){
						i=p.items[p.items.length-ii-1];
						if(i.s||i.separator||i.l||i.label||i.d||i.disabled)continue;
						if(i._lt!=''&&i._lt.indexOf(v)===0){
							// match found
							v=(i.t||i.text||'').slice(v.length);
							if(v!=''){
								tb.value=ws_trim(tb.value)+v;
								r.end=tb.value.length;
								cSel($(tb),r);
							}
							cc.highlight(0,p.items.length-ii-1,1);
							break;
						}
					}
				}

				// value adjusted now validate
				if(!fVal(ws_trim(tb.value)))$(d).addClass('wsc-invalid');
				else $(d).removeClass('wsc-invalid');
			});
		}
	};

	/**
	 * Properly calculate the width of the combo parts.
	 * @param {Object} p The combo settings.
	 * @returns {Number} The min width of the dropdown part in pixels.
	 */
	Ws.Combo.fn.onresize=function(p){
		var cc = this,cn=p.className,css={overflow:'visible',overflowY:'',height:'25px',width:'1px'},mw,ul;
		if(!cc.ui_li){
			cc.ui_p=cc.ui.find('div.'+cn+'-items');
			cc.ui_li=cc.ui.find('div.'+cn+'-items li');
			cc.ui.bind('mousewheel', function(e){e.preventDefault();return false;});
			if (iOS) // finish scrolling
				cc.ui_p.bind('touchstart', function(){
					
				}).bind('touchmove', function(e,t){
					e.preventDefault();
					t = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
				});
			else
				cc.ui_p.bind('mousewheel', function(e,d,t){
					t=cc.ui_p.scrollTop() - (d * 50);
					cc.ui_p.scrollTop(t);
					e.preventDefault();
					return false;
				});
		}

		// set to calc
		if($.browser.msie&&$.browser.version<8)
			cc.ui.find('div.'+cn+'-items li.'+cn+'-separator').css({width:'1%'});
		if(p.combo)$('#'+p.id+'_cb').css({width:'1px'});
		cc.ui.children().css({width:'1%'});
		cc.ui.find('.ws-combo-itop').css({width:'1px',paddingLeft:0});
		cc.ui.css({width:'auto'});
		cc.ui_p.css(css);

		// min width
		ul=cc.ui_p.children('ul');
		mw=ul.css({'float':'left',width:'auto'}).width();
		ul.css({'float':'none',width:''});
		if(p.maxHeight>0&&ul.height()>p.maxHeight){
			mw+=ws_sb();
			css={height:p.maxHeight+'px'};
			ul=1;
		} else {
			css={height:''};
			ul=0;
		}
		css.width='';
		css.overflow='hidden';
		cc.ui_p.css(css);
		if(ul)cc.ui_p.css({overflowY:'scroll'});

		// footer
		if (p.combo||p.reset)
		{
			ul=cc.ui.find('.'+cn+'-footer');
			cn=cBox(ul);
			mw=Math.max(mw, ul.width() + cn.padding[1] + cn.padding[3]);
		}

		return mw;
	}

	/**
	 * Properly update the size of the combo parts.
	 * @param {Object} p The combo settings.
	 */
	Ws.Combo.fn.onbeforeshow=function(p,byKey){
		var cc=this, cn=p.className, ci=cc.ui.find('.ws-combo-itop'), sep=cc.ui.find('div.'+cn+'-items li.'+cn+'-separator'),i;
		ci.css({paddingLeft:(cc.div.width()-cc.btn.width())+'px'});
		ci.get(0).style.display=p.flip?'none':'block';
		ci.get(1).style.display=p.flip?'block':'none';

		// set proper sep width
		if($.browser.msie&&$.browser.version<8){
			var nw=cc.ui_p.find('ul').width(),nb=cBox(sep);
			nb=nb.padding[1]+nb.padding[3];
			sep.css({width:(nw-nb)+'px'});
			// also setup overlay iframe if needed
			if(!cc.iefr)
				cc.iefr=cc.ui.prepend('<iframe style="float:left;position:absolute;z-index:-1;filter:mask();border:0;margin:0;padding:0;top:0;left:0;width:1px;height:1px;overflow:hidden"></iframe>').children('iframe');
			cc.iefr.css({width:cc.ui.outerWidth()+'px',height:cc.ui.outerHeight()});	
		}

		// set proper tb width
		if(p.combo){
			var tb=$('#'+p.id+'_cb'),b=cBox(tb),pb=cBox(tb.parent());
			tb.css({width:(pb.width-b.padding[1]-b.padding[3]-b.border[1]-b.border[3]-pb.padding[1]-pb.padding[3])+'px'});
		}

		// highlight first item
		if(byKey&&cc.oldJ==-1){
			// cc.oldJ=-1;
			ci=0;
			while(ci<p.items.length){
				i=p.items[ci];
				if(i.s||i.separator||i.l||i.label||i.d||i.disabled)
					ci++;
				else
					return cc.highlight(0,ci,1);
			}
		}
	};

	/**
	 * Select the combo item.
	 * @param {Number} i The index of the item to select.
	 * @param {Bool} [a] True to not hide; false otherwise.
	 */
	Ws.Combo.fn.select=function(i,a){	
		var cc=this,p=cc.settings,ip=cc.input.get(0),t;
		if(i<0)return cc.reset(a);	
		cc.selectedIndex=i;
		i=p.items[i];
		t=i.t||i.text||'';
		cc.input.val(cc.i_v=t).attr('class','dropdown-txt');
		cc.hidden.val(i.v||i.value||t);	
		cc.img.css({background:i.im||''}).attr('class', 'dropdown-img'+(i.im?'':' dropdown-img-empty'));	
		if(cc.expanded&&!a){
			cc.hide();
			ip.focus();if(ip.select)ip.select();
		}
		// cleanup
		cc.he();
		cc.on('select',i);
		return cc; // chainable
	};

	/**
	 * Reset the combo.
	 * @param {Bool} [a] True to not hide; false otherwise.
	 * @returns {Ws.Combo} Reference to self.
	 */
	Ws.Combo.fn.reset=function(a){
		var cc=this,p=cc.settings,ip=cc.input.get(0);
		cc.selectedIndex=-1;	
		cc.hidden.val(p.value||'');
		cc.input.val(p.text||'').attr('class','dropdown-txt combo-sel');
		cc.img.css('background','').attr('class', 'dropdown-img dropdown-img-empty');
		if(cc.expanded&&!a){
			cc.hide();
			ip.focus();if(ip.select)ip.select();
		} else if(!cc.focused) {
			delete cc.i_v;
			cc.input.val(p.text||'').attr('class','dropdown-txt combo-sel');
		}
		// cleanup
		cc.he();
		cc.on('select');
		return cc; // chainable
	};

	/**
	 * Key pressed in dropdown input.
	 * @param {Object} e Object that holds the event details.
	 */
	Ws.Combo.fn.onkey=function(e){
		if(e.type!='keydown')return;

		var cc=this,p=cc.settings,cn=p.className,ci=cc.oldJ,cd=-1,i;

		// ESC pressed
		if (e.keyCode==27)
		{
			cc.hide();
			e.processed=e.cancel=1;
			return;
		}

		// not expanded so nothing to process
		if(!cc.expanded)return;

		// process other keys
		if(e.keyCode==40)//down
		{
			ci++;
			cd=1;
		}
		else if (e.keyCode==38)//up
		{
			if(ci==-1)ci=p.items.length;
			ci--;
			cd=0;
		}
		else if (e.keyCode==34)//pgdn
		{
			if(ci==-1)ci=0;
			else ci+=5;
			cd=1;
		}
		else if (e.keyCode==33)//pgup
		{
			if(ci==-1)ci=p.items.length;
			else ci-=5;
			cd=0;
		}
		else if (e.keyCode==13) // enter
		{
			if(ci>=0&&ci<p.items.length)
				cc.select(ci);
			e.processed=e.cancel=1;
			return;
		}
		else
			return; // other keys

		// mark as processed and cancel
		e.processed=e.cancel=1;

		if (ci<0) ci = 0;
		else if (ci>=p.items.length) ci=p.items.length-1;
	
		// skip unselectable items
		while(ci>=0&&ci<p.items.length){
			i=p.items[ci];
			if(i.s||i.separator||i.l||i.label||i.d||i.disabled)
				ci+=(cd?1:-1);
			else
				break;
		}

		// check if within bounds, if yes then highlight the correct item
		if(ci<0||ci>=p.items.length||ci==cc.oldJ)return;
		cc.highlight(0, ci, 1);
	};

})(jQuery);