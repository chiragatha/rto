
$(document).ready(function() {
    $('#frm_insert').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            email: {
                validators: {
                    
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            },
            telephone: {
                validators: {
                    notEmpty: {
                        message: 'The Telephone/Mobile No is required and cannot be empty'
                    },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                }
            },
            fax: {
                validators: {
                    
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The fax No must be less than 10-11 digit long'
                    }
                }
            },
            contactPerson: {
                validators: {
                    notEmpty: {
                        message: 'The contact person name is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[a-z\s]+$/i,
                       message: 'The contact person name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            }, 
            insCompany: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            chassisNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            enginNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            model: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            make: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            hypothecation: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            rlw: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            uw: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            pl: {
                validators: {
                    
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            taxReceNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            amount: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            taxReceiptNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            taxAmount: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            taxRenewed: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            permitNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }, 
            vehicleNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },penalty:{
                validators: {
                    regexp: {

                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                    }
                }
            },receiptNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }
            
        }
    });
    
    
    $('#frm_edit').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
            coTitle: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            coEmail: {
                validators: {
                    
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            coTelephone: {
                validators: {
                    notEmpty: {
                        message: 'The Telephone/Mobile No is required and cannot be empty'
                    },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                }
            },
            coFax: {
                validators: {
                    
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The fax No must be less than 10-11 digit long'
                    }
                }
            },
            coContactPerson: {
                validators: {
                    notEmpty: {
                        message: 'The contact person name is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[a-z\s]+$/i,
                       message: 'The contact person name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            coHOAddress: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },
            coCompany: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            vehChassisNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            vehEnginNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            vehModel: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            vehMake: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            vehHypothecation: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            vehRLW: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            vehUW: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            vehPL: {
                validators: {
                   
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            taxReceiptNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            taxReceiptNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            taxReceiptNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            taxAmount: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            taxRenewed: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },perPermitNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }, 
            vehVehicleNo:{
                validators: {
                    notEmpty: {
                        message: 'The vehicale no is required and cannot be empty'
                    }
                }
            },perRenewed:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },pasRenewed:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },nphPermitNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },npdAmount: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                    
                }
            },npdBankName: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[A-Za-z]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                    
                }
            },state: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },npdBankDraftNo: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                   notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },receiptNo:{
                validators: {
                    regexp: {
                       regexp: /^[a-zA-Z0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                   notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            }, amount:{
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                   notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            }, penalty:{
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                   notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },regNo:{
                validators: {
                    regexp: {
                       regexp: /^[a-zA-Z0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                   notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },vehVehicleNo:{
                validators: {
                   
                   notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            }
            
        }
        
      
    });
    
    
    $('#frm_insert1').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            },        
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },
            receAddress: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },permitNo: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },vehicleNo: {
                validators: {
                    notEmpty: {
                        message: 'The vehicale no is required and cannot be empty'
                    }
                    
                }
            },amount: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                    
                }
            },receTelephone: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            },telephone: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            },mobile: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            }, fax: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            }, email: {
                validators: {
                    emailAddress: {
                      
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                    
                }
            },state: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },bankName: {
                validators: {
                    regexp: {
                       regexp: /^[A-Za-z]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                    
                }
            },draftNo: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                   notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            }
            
        }
    });
    
    
    $('#frm_edit1').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
            rcTitle: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[a-z\s]+$/i,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                }
            },
           
            rcName: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[a-z\s]+$/i,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            },
            
            rcRCAddress: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },
            rcResiAddress: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },nphPermitNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },nphRenewed1:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }, 
            vehVehicleNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },nphPermitNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },npdAmount: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                    
                }
            },receTelephone: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            },rcTelephone: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            },rcResiTelephone: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            },rcMobile:{
                    validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            }, rcFax: {
                validators: {
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The name can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                    
                }
            }, rcEmailID: {
                validators: {
                    emailAddress: {
                      
                       message: 'The name can consist of alphabetical characters and spaces only'
                   }
                    
                }
            },insPolicyNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }
            
        }
    });
    $('#frm_insert2').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
            insCompany: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    }
                }
            },
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            },        
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },
            receAddress: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },permitNo: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },vehicleNo: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                    
                }
            },insuPolicyNo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }
            
        }
    });
    
    
    $('#frm_edit2').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
            insuPolicyNo: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    }
                }
            },
           
            insInsuranceCo: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            insuRenewed:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }, 
            vehVehicleNo:{
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            }
            
        }
    });
    $('#frm_insert3').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
           
            name: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            },mobile:{
                validators: {
                    
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                }
            }, contactPerson:{
                validators: {
                    
                    regexp: {
                       regexp: /^[ A-Za-z]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            } ,telephone:{
                validators: {
                  
                    regexp: {
                       regexp: /^[ 0-9]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                }
            }
            
        }
    });
    
    
    $('#frm_edit3').bootstrapValidator({

        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh' 
        },
        fields: {
            insInsuranceCo: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    regexp: {
                       regexp: /^[ A-Za-z_@./#&+-]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            },insMobile:{
                validators: {
                    
                    regexp: {
                       regexp: /^[0-9]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                }
            }, insContactPerson:{
                validators: {
                    
                    regexp: {
                       regexp: /^[ A-Za-z]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   }
                }
            } ,insTelephone:{
                validators: {
                  
                    regexp: {
                       regexp: /^[ 0-9]*$/,
                       message: 'The title can consist of alphabetical characters and spaces only'
                   },
                    stringLength: {
                         min: 10,
                        max: 11,
                        message: 'The Telephone/Mobile No must be less than 10-11 digit long'
                    }
                }
            }
            
        }
    });
});
