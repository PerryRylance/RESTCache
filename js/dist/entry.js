(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.RecordsTable = void 0;

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

require('./Table');

var RecordsTable = /*#__PURE__*/function (_RESTCache$Table) {
  _inherits(RecordsTable, _RESTCache$Table);

  var _super = _createSuper(RecordsTable);

  function RecordsTable() {
    _classCallCheck(this, RecordsTable);

    return _super.apply(this, arguments);
  }

  return RecordsTable;
}(RESTCache.Table);

exports.RecordsTable = RecordsTable;
jQuery(function ($) {
  RESTCache.recordsTable = new RecordsTable($("#records table"));
});

},{"./Table":3}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.RulesTable = void 0;

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _get(target, property, receiver) { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get; } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(receiver); } return desc.value; }; } return _get(target, property, receiver || target); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

require('./Table');

var RulesTable = /*#__PURE__*/function (_RESTCache$Table) {
  _inherits(RulesTable, _RESTCache$Table);

  var _super = _createSuper(RulesTable);

  function RulesTable(element) {
    _classCallCheck(this, RulesTable);

    return _super.call(this, element);
  }

  _createClass(RulesTable, [{
    key: "getControlFromField",
    value: function getControlFromField(field) {
      switch (field) {
        case "regex":
          var $input = _get(_getPrototypeOf(RulesTable.prototype), "getControlFromField", this).call(this, field);

          $input.attr("type", "checkbox");
          $input.attr("checked", $input.val() == 1);
          $input.val("on");
          return $input;
          break;

        case "behaviour":
          var $select = $("<select name='behaviour'>\
					<option value=''></option>\
					<option value=''></option>\
				</select>");
          break;

        case "priority":
          break;
      }

      return _get(_getPrototypeOf(RulesTable.prototype), "getControlFromField", this).call(this, field);
    }
  }]);

  return RulesTable;
}(RESTCache.Table);

exports.RulesTable = RulesTable;
jQuery(function ($) {
  RESTCache.rulesTable = new RulesTable($("#rules table"));
});

},{"./Table":3}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Table = void 0;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Table = /*#__PURE__*/function () {
  function Table(element) {
    var _this = this;

    _classCallCheck(this, Table);

    var self = this;
    this.$element = $(element);
    this.url = this.$element.attr("data-route");
    this.$element.on("click", "[data-action='edit']", function (event) {
      return _this.onEdit(event);
    });
    this.$element.on("click", "[data-action='update']", function (event) {
      return _this.onUpdate(event);
    });
    this.$element.on("click", "[data-action='delete']", function (event) {
      return _this.onDelete(event);
    });
  }

  _createClass(Table, [{
    key: "getIDFromEvent",
    value: function getIDFromEvent(event) {
      var $tr = $(event.currentTarget).closest("tr");
      var id = $tr.attr("data-id");
      return id;
    }
  }, {
    key: "getControlFromField",
    value: function getControlFromField(field) {
      var $input = $("<input/>");
      $input.attr("name", field);
      return $input;
    }
  }, {
    key: "setItemEditable",
    value: function setItemEditable(id) {
      var self = this;
      var $tr = this.$element.find("tr[data-id='" + id + "']");
      $tr.children("td").each(function (index, td) {
        var field = $(td).attr("data-field");

        switch (field) {
          case "id":
          case "actions":
            return true;
            break;
        }

        var $input = self.getControlFromField(field);
        $input.val($(td).text());
        $(td).empty();
        $(td).append($input);
      });
      $tr.addClass("rest-cache-editing");
    }
  }, {
    key: "onEdit",
    value: function onEdit(event) {
      var id = this.getIDFromEvent(event);
      this.setItemEditable(id);
    }
  }, {
    key: "onUpdate",
    value: function onUpdate(event) {
      var self = this;
      var id = this.getIDFromEvent(event);
      var data = {};
      var $tr = $(event.currentTarget).closest("tr");
      $tr.find(":input").each(function (index, el) {
        if (!$(el).attr("name")) return;
        data[$(el).attr("name")] = $(el).val();
      });
      $.ajax(this.url + "/" + id, {
        method: "PUT",
        data: data,
        success: function success(response, status, xhr) {
          self.onActionComplete(response);
        }
      });
    }
  }, {
    key: "onDelete",
    value: function onDelete(event) {
      var self = this;
      var id = this.getIDFromEvent(event);
      $.ajax(this.url + "/" + id, {
        method: "DELETE",
        success: function success(response, status, xhr) {
          self.onActionComplete(response);
        }
      });
    }
  }, {
    key: "onActionComplete",
    value: function onActionComplete(event) {
      this.$element.DataTable().ajax.reload();
    }
  }]);

  return Table;
}();

exports.Table = Table;
RESTCache.Table = Table;

},{}],4:[function(require,module,exports){
"use strict";

window.$ = jQuery;
window.RESTCache = {};

require('./RulesTable');

require('./RecordsTable');

jQuery(function ($) {
  $("#rest-cache-tabs").tabs();
});

},{"./RecordsTable":1,"./RulesTable":2}]},{},[4])

//# sourceMappingURL=entry.js.map
