!function(t,e){function i(t){r.call(this,t)}var r=t.Field;i.prototype=new r({autosearch:!0,filterTemplate:function(){if(!this.filtering)return"";var t=this._grid,e=this.filterControl=this._createTextBox();return this.autosearch&&e.on("keypress",function(e){13===e.which&&(t.search(),e.preventDefault())}),e},insertTemplate:function(){if(!this.inserting)return"";var t=this.insertControl=this._createTextBox();return t},editTemplate:function(t){if(!this.editing)return this.itemTemplate(t);var e=this.editControl=this._createTextBox();return e.val(t),e},filterValue:function(){return this.filterControl.val()},insertValue:function(){return this.insertControl.val()},editValue:function(){return this.editControl.val()},_createTextBox:function(){return e("<input>").attr("type","text")}}),t.fields.text=t.TextField=i}(jsGrid,jQuery);