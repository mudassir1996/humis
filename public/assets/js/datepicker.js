$(function() {
  'use strict';

  if($('#datePickerIssueDate').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerIssueDate').datepicker({
      format: "mm/dd/yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerIssueDate').datepicker('setDate', today);
  }
  if($('#datePickerExpiryDate').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExpiryDate').datepicker({
      format: "mm/dd/yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExpiryDate').datepicker('setDate', today);
  }
  if($('#datePickerDOB').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerDOB').datepicker({
      format: "mm/dd/yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerDOB').datepicker('setDate', today);
  }

  if ($('#datePickerArrival').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerArrival').datepicker({
      format: "mm/dd/yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerArrival').datepicker('setDate', today);
  }
  if ($('#datePickerDeparture').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerDeparture').datepicker({
      format: "mm/dd/yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerDeparture').datepicker('setDate', today);
  }
});