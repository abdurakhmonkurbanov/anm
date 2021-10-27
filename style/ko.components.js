ko.COMPONENTS = {
    'extensions': {
        scripts: [
            {
                type: 'ko.ext',
                url: "/Scripts/knockout-controls/extensions/ko.ext.js"
            }
        ]
    },
    'contextmenu': {
        scripts: [
            {
                type: '$.contextmenu',
                url: "/Scripts/knockout-controls/contextMenu/contextmenu.js"
            }
        ]
    },
    'cultureService': {
        scripts: [
            {
                type: 'ko.cultureService',
                url: "/Scripts/knockout-controls/culture/ko.cultureService.js"
            }
        ]
    },
    'translit': {
        scripts: [
            {
                type: '$t',
                url: "/Scripts/knockout-controls/Transliterator/lct.min.js"
            }
        ]
    },
    'pager': {
        scripts: [
            {
                type: 'ko.pager',
                url: "/Scripts/knockout-controls/pager/ko.pager.js"
            }
        ],
        templates: [
            {
                id: 'ko-pager',
                url: "/Scripts/knockout-controls/pager/ko.pager.template.html"
            }
        ]
    },
    'password': {
        scripts: [
            {
                type: 'ko.setPassword',
                url: "/Scripts/knockout-controls/password/ko.setPassword.js"
            }
        ],
        templates: [
            {
                id: 'ko-setPassword',
                url: "/Scripts/knockout-controls/password/ko.setPassword.html"
            }
        ]
    },
    'diagnose': {
        scripts: [
            {
                type: 'ko.diagnose',
                url: "/Scripts/knockout-controls/diagnose/ko.diagnose.js"
            }
        ],
        templates: [
            {
                id: 'ko-diagnose',
                url: "/Scripts/knockout-controls/diagnose/ko.diagnose.template.html"
            }
        ],
        related: ['treeGrid']
    },
    'diagnosticStep': {
        scripts: [
            {
                type: 'ko.diagnosticStep',
                url: "/Scripts/knockout-controls/diagnosticStep/ko.diagnosticStep.js"
            }
        ],
        templates: [
            {
                id: 'ko-diagnosticStep',
                url: "/Scripts/knockout-controls/diagnosticStep/ko.diagnosticStep.template.html"
            }
        ],
    },
    'diagnosisType': {
        scripts: [
            {
                type: 'ko.diagnosisType',
                url: "/Scripts/knockout-controls/diagnosisType/ko.diagnosisType.js"
            }
        ],
        templates: [
            {
                id: 'ko-diagnosisType',
                url: "/Scripts/knockout-controls/diagnosisType/ko.diagnosisType.template.html"
            }
        ],
    },

    'hospital': {
        scripts: [
            {
                type: 'ko.hospital',
                url: "/Scripts/knockout-controls/hospital/ko.hospital.js"
            }
        ],
        templates: [
            {
                id: 'ko-Hospital',
                url: "/Scripts/knockout-controls/hospital/ko.hospital.template.html"
            }
        ],
    },

    'institution': {
        scripts: [
            {
                type: 'ko.institution',
                url: "/Scripts/knockout-controls/institution/ko.institution.js"
            }
        ],
        templates: [
            {
                id: 'ko-Institution',
                url: "/Scripts/knockout-controls/institution/ko.institution.template.html"
            }
        ],
    },
    'user': {
        scripts: [
            {
                type: 'ko.user',
                url: "/Scripts/knockout-controls/user/ko.user.js"
            }
        ],
        templates: [
            {
                id: 'ko-User',
                url: "/Scripts/knockout-controls/user/ko.user.template.html"
            }
        ],
    },
    'select2Manual': {
        scripts: [
            {
                type: 'ko.select2Manual',
                url: "/Scripts/knockout-controls/select2Manual/ko.select2Manual.js"
            }
        ],
        templates: [
            {
                id: 'ko-select2Manual',
                url: "/Scripts/knockout-controls/select2Manual/ko.select2Manual.html"
            }
        ],
    },

    'apiDataSource': {
        scripts: [
            {
                type: 'ko.apiDataSource',
                url: "/Scripts/knockout-controls/apiDataSource/ko.apiDataSource.js"
            }
        ],
        related: ['pager']
    },
    'treeGrid': {
        scripts: [
            {
                type: 'ko.treeGrid',
                url: "/Scripts/knockout-controls/treeGrid/ko.treeGrid.js"
            }
        ],
        templates: [
            {
                id: 'ko-treeGrid',
                url: "/Scripts/knockout-controls/treeGrid/ko.treeGrid.html"
            }
        ],
        related: ['apiDataSource','contextmenu']
    },
    'identity': {
        scripts: [
            {
                type: 'ko.identity',
                url: "/Scripts/knockout-controls/identity/ko.identity.js"
            }
        ]
    },
    'receptionGrid': {
        scripts: [
            {
                type: 'ko.receptionGrid',
                url: "/Scripts/knockout-controls/receptionGrid/ko.receptionGrid.js"
            }
        ],
        templates: [
            {
                id: 'ko-receptionGrid',
                url: "/Scripts/knockout-controls/receptionGrid/ko.receptionGrid.template.html"
            }
        ],
        related: ['ReceptionViewModel']
    },
    'duringPregnancyGrid': {
        scripts: [
            {
                type: 'ko.duringPregnancyGrid',
                url: "/Scripts/knockout-controls/duringPregnancyGrid/ko.duringPregnancyGrid.js"
            }
        ],
        templates: [
            {
                id: 'ko-duringPregnancyGrid',
                url: "/Scripts/knockout-controls/duringPregnancyGrid/ko.duringPregnancyGrid.template.html"
            }
        ],
        related: ['ReceptionPlaceCode']
    },
    'childBirthPrepareGrid': {
        scripts: [
            {
                type: 'ko.childBirthPrepareGrid',
                url: "/Scripts/knockout-controls/Pregnancy/ko.childBirthPrepareGrid.js"
            }
        ],
        templates: [
            {
                id: 'ko-childBirthPrepareGrid',
                url: "/Scripts/knockout-controls/Pregnancy/ko.childBirthPrepareGrid.template.html"
            }
        ],
        related: ['ReceptionPlaceCode', 'ChildBirthPrepareViewModel']
    },
    'preventiveInspectionOfChildGrid': {
        scripts: [
            {
                type: 'ko.preventiveInspectionOfChildGrid',
                url: "/Scripts/knockout-controls/preventiveInspectionOfChildGrid/ko.preventiveInspectionOfChildGrid.js"
            }
        ],
        templates: [
            {
                id: 'ko-preventiveInspectionOfChildGrid',
                url: "/Scripts/knockout-controls/preventiveInspectionOfChildGrid/ko.preventiveInspectionOfChildGrid.template.html"
            }
        ]
    },
    'ReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.ReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.ReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.ReceptionViewModel.html"
            },
            {
                id: 'ko-models-DefaultReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.DefaultReceptionViewModel.html"
            },
            {
                id: 'ko-models-AppointmentViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.AppointmentViewModel.html"
            }
        ],
        related: ['ReceptionPlaceCode', 'ReceptionForm', 'TypeOfReception', 'ReceptionCode', 'extensions', 'drug', 'diagnose', 'diagnosisType']
    },
    'TherapistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.TherapistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.TherapistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-TherapistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.TherapistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'CardiologistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.CardiologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.CardiologistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-CardiologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.CardiologistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'RheumatologistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.RheumatologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.RheumatologistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-RheumatologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.RheumatologistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'EndocrinologistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.EndocrinologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.EndocrinologistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-EndocrinologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.EndocrinologistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'OtolaryngologistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.OtolaryngologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.OtolaryngologistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-OtolaryngologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.OtolaryngologistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'OculistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.OculistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.OculistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-OculistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.OculistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'NeuropatologistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.NeuropatologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.NeuropatologistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-NeuropatologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.NeuropatologistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'SurgeonReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.SurgeonReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.SurgeonReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-SurgeonReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.SurgeonReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'UrologistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.UrologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.UrologistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-UrologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.UrologistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'LinersReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.LinersReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.LinersReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-LinersReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.LinersReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'GynecologistReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.GynecologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.GynecologistReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-GynecologistReceptionViewModel',
                url: "/Scripts/knockout-controls/receptionGrid/ko.models.GynecologistReceptionViewModel.html"
            }
        ],
        related: ['humanOrganInReception']
    },
    'ReceptionCode': {
        scripts: [
            {
                type: 'ko.ReceptionCode',
                url: "/Scripts/knockout-controls/ReceptionCode/ko.ReceptionCode.js"
            }
        ],
        templates: [
            {
                id: 'ko-ReceptionCode',
                url: "/Scripts/knockout-controls/ReceptionCode/ko.ReceptionCode.template.html"
            }
        ],
        related: ['treeGrid']
    },
    'ReceptionCodeViewModel': {
        scripts: [
            {
                type: 'ko.models.ReceptionCodeViewModel',
                url: "/Scripts/knockout-controls/ReceptionCode/ko.models.ReceptionCodeViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ReceptionCodeViewModel',
                url: "/Scripts/knockout-controls/ReceptionCode/ko.models.ReceptionCodeViewModel.html"
            }
        ],
    },
    'DiagnoseViewModel': {
        scripts: [
            {
                type: 'ko.models.DiagnoseViewModel',
                url: "/Scripts/knockout-controls/diagnose/ko.models.DiagnoseViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-DiagnoseViewModel',
                url: "/Scripts/knockout-controls/diagnose/ko.models.DiagnoseViewModel.html"
            }
        ],
        related: ['cultureService']

    },
    'humanOrganInReception': {
        scripts: [
            {
                type: 'ko.humanOrganInReception',
                url: "/Scripts/knockout-controls/receptionGrid/ko.humanOrganInReception.js"
            }
        ],
        templates: [
            {
                id: 'ko-humanOrganInReception',
                url: "/Scripts/knockout-controls/receptionGrid/ko.humanOrganInReception.template.html"
            }
        ],
        related: ['humanOrganService']
    },
    'ReceptionPlaceCodeViewModel': {
        scripts: [
            {
                type: 'ko.models.ReceptionPlaceCodeViewModel',
                url: "/Scripts/knockout-controls/ReceptionPlaceCode/ko.models.ReceptionPlaceCodeViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ReceptionPlaceCodeViewModel',
                url: "/Scripts/knockout-controls/ReceptionPlaceCode/ko.models.ReceptionPlaceCodeViewModel.html"
            }
        ],
        related: ['cultureService']
    },
    'ReceptionFormViewModel': {
        scripts: [
            {
                type: 'ko.models.ReceptionFormViewModel',
                url: "/Scripts/knockout-controls/ReceptionForm/ko.models.ReceptionFormViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ReceptionFormViewModel',
                url: "/Scripts/knockout-controls/ReceptionForm/ko.models.ReceptionFormViewModel.html"
            }
        ],
        related: ['cultureService']
    },
    'TreatmentResultViewModel': {
        scripts: [
            {
                type: 'ko.models.TreatmentResultViewModel',
                url: "/Scripts/knockout-controls/TreatmentResult/ko.models.TreatmentResultViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-TreatmentResultViewModel',
                url: "/Scripts/knockout-controls/TreatmentResult/ko.models.TreatmentResultViewModel.html"
            }
        ],
        related: ['cultureService']
    },
    'TypeOfReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.TypeOfReceptionViewModel',
                url: "/Scripts/knockout-controls/TypeOfReception/ko.models.TypeOfReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-TypeOfReceptionViewModel',
                url: "/Scripts/knockout-controls/TypeOfReception/ko.models.TypeOfReceptionViewModel.html"
            }
        ],
        related: ['cultureService']
    },
    'ReceptionPlaceCode': {
        scripts: [
            {
                type: 'ko.ReceptionPlaceCode',
                url: "/Scripts/knockout-controls/ReceptionPlaceCode/ko.ReceptionPlaceCode.js"
            }
        ],
        templates: [
            {
                id: 'ko-ReceptionPlaceCode',
                url: "/Scripts/knockout-controls/ReceptionPlaceCode/ko.ReceptionPlaceCode.html"
            }
        ]
    },
    'ReceptionForm': {
        scripts: [
            {
                type: 'ko.ReceptionForm',
                url: "/Scripts/knockout-controls/ReceptionForm/ko.ReceptionForm.js"
            }
        ],
        templates: [
            {
                id: 'ko-ReceptionForm',
                url: "/Scripts/knockout-controls/ReceptionForm/ko.ReceptionForm.html"
            }
        ]
    },
    'TypeOfReception': {
        scripts: [
            {
                type: 'ko.TypeOfReception',
                url: "/Scripts/knockout-controls/TypeOfReception/ko.TypeOfReception.js"
            }
        ],
        templates: [
            {
                id: 'ko-TypeOfReception',
                url: "/Scripts/knockout-controls/TypeOfReception/ko.TypeOfReception.html"
            }
        ]
    },
    'TreatmentResult': {
        scripts: [
            {
                type: 'ko.TreatmentResult',
                url: "/Scripts/knockout-controls/TreatmentResult/ko.TreatmentResult.js"
            }
        ],
        templates: [
            {
                id: 'ko-TreatmentResult',
                url: "/Scripts/knockout-controls/TreatmentResult/ko.TreatmentResult.html"
            }
        ]
    },
    'ContraindicationType': {
        scripts: [
            {
                type: 'ko.ContraindicationType',
                url: "/Scripts/knockout-controls/ContraindicationType/ko.ContraindicationType.js"
            }
        ],
        templates: [
            {
                id: 'ko-ContraindicationType',
                url: "/Scripts/knockout-controls/ContraindicationType/ko.ContraindicationType.html"
            }
        ]
    },
    'humanOrganService': {
        scripts: [
            {
                type: 'ko.humanOrganService',
                url: "/Scripts/knockout-controls/humanOrgan/ko.humanOrganService.js"
            }
        ],
        related: ['identity']
    },
    'InjuryOrPoisoningTypeViewModel': {
        scripts: [
            {
                type: 'ko.models.InjuryOrPoisoningTypeViewModel',
                url: "/Scripts/knockout-controls/InjuryOrPoisoningType/ko.models.InjuryOrPoisoningTypeViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-InjuryOrPoisoningTypeViewModel',
                url: "/Scripts/knockout-controls/InjuryOrPoisoningType/ko.models.InjuryOrPoisoningTypeViewModel.html"
            }
        ],
        related: ['cultureService']
    },
    'InjuryOrPoisoningType': {
        scripts: [
            {
                type: 'ko.InjuryOrPoisoningType',
                url: "/Scripts/knockout-controls/InjuryOrPoisoningType/ko.InjuryOrPoisoningType.js"
            }
        ],
        templates: [
            {
                id: 'ko-InjuryOrPoisoningType',
                url: "/Scripts/knockout-controls/InjuryOrPoisoningType/ko.InjuryOrPoisoningType.html"
            }
        ]
    },
    'StatCouponViewModel': {
        scripts: [
            {
                type: 'ko.models.StatCouponViewModel',
                url: "/Scripts/knockout-controls/StatCoupon/ko.models.StatCouponViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-StatCouponViewModel',
                url: "/Scripts/knockout-controls/StatCoupon/ko.models.StatCouponViewModel.html"
            }
        ],
        related: ['InjuryOrPoisoningType']
    },
    'DirectionalHospitalViewModel': {
        scripts: [
            {
                type: 'ko.models.DirectionalHospitalViewModel',
                url: "/Scripts/knockout-controls/DirectionalHospital/ko.models.DirectionalHospitalViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-DirectionalHospitalViewModel',
                url: "/Scripts/knockout-controls/DirectionalHospital/ko.models.DirectionalHospitalViewModel.html"
            }
        ],
        related: ['user', 'institution']
    },
    'EducationalnstitutionCardTreatmentViewModel': {
        scripts: [
            {
                type: 'ko.models.EducationalnstitutionCardTreatmentViewModel',
                url: "/Scripts/knockout-controls/EducationalnstitutionCardTreatment/ko.models.EducationalnstitutionCardTreatmentViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-EducationalnstitutionCardTreatmentViewModel',
                url: "/Scripts/knockout-controls/EducationalnstitutionCardTreatment/ko.models.EducationalnstitutionCardTreatmentViewModel.html"
            }
        ],
    },
    'PregnancyViewModel': {
        scripts: [
            {
                type: 'ko.models.PregnancyViewModel',
                url: "/Scripts/knockout-controls/Pregnancy/ko.models.PregnancyViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-PregnancyViewModel',
                url: "/Scripts/knockout-controls/Pregnancy/ko.models.PregnancyViewModel.html"
            }
        ],
        related: ['select2Manual']
    },
    'ChildBirthPrepareViewModel': {
        scripts: [
            {
                type: 'ko.models.ChildBirthPrepareViewModel',
                url: "/Scripts/knockout-controls/Pregnancy/ko.models.ChildBirthPrepareViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ChildBirthPrepareViewModel',
                url: "/Scripts/knockout-controls/Pregnancy/ko.models.ChildBirthPrepareViewModel.html"
            }
        ],
        related: ['select2Manual']
    },
    'HistoryDevelopmentChildTreatmentViewModel': {
        scripts: [
            {
                type: 'ko.models.HistoryDevelopmentChildTreatmentViewModel',
                url: "/Scripts/knockout-controls/HistoryDevelopmentChildTreatment/ko.models.HistoryDevelopmentChildTreatmentViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-HistoryDevelopmentChildTreatmentViewModel',
                url: "/Scripts/knockout-controls/HistoryDevelopmentChildTreatment/ko.models.HistoryDevelopmentChildTreatmentViewModel.html"
            }
        ],
    },
    'InformationAboutNewbornViewModel': {
        scripts: [
            {
                type: 'ko.models.InformationAboutNewbornViewModel',
                url: "/Scripts/knockout-controls/InformationAboutNewborn/ko.models.InformationAboutNewbornViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-InformationAboutNewbornViewModel',
                url: "/Scripts/knockout-controls/InformationAboutNewborn/ko.models.InformationAboutNewbornViewModel.html"
            }
        ],
        related: ['select2Manual']
    },
    'ContraceptionMethodViewModel': {
        scripts: [
            {
                type: 'ko.models.ContraceptionMethodViewModel',
                url: "/Scripts/knockout-controls/additional/contraceptionMethod/ko.models.ContraceptionMethodViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ContraceptionMethodViewModel',
                url: "/Scripts/knockout-controls/additional/contraceptionMethod/ko.models.ContraceptionMethodViewModel.html"
            }
        ],
    },
    'ContraceptionMethod': {
        scripts: [
            {
                type: 'ko.contraceptionMethod',
                url: "/Scripts/knockout-controls/additional/contraceptionMethod/ko.contraceptionMethod.js"
            }
        ],
        templates: [
            {
                id: 'ko-contraceptionMethod',
                url: "/Scripts/knockout-controls/additional/contraceptionMethod/ko.contraceptionMethod.template.html"
            }
        ],
        related: ['grid']
    },
    'grid': {
        scripts: [
            {
                type: 'ko.grid',
                url: "/Scripts/knockout-controls/grid/ko.grid.js"
            }
        ],
        templates: [
            {
                id: 'ko-grid',
                url: "/Scripts/knockout-controls/grid/ko.grid.html"
            }
        ],
        related: ['apiDataSource']
    },

    'SportType': {
        scripts: [
            {
                type: 'ko.sportType',
                url: "/Scripts/knockout-controls/additional/sportType/ko.sportType.js"
            }
        ],
        templates: [
            {
                id: 'ko-sportType',
                url: "/Scripts/knockout-controls/additional/sportType/ko.sportType.template.html"
            }
        ],
        related: ['grid']
    },

    'SportTypeViewModel': {
        scripts: [
            {
                type: 'ko.models.SportTypeViewModel',
                url: "/Scripts/knockout-controls/additional/sportType/ko.models.SportTypeViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-SportTypeViewModel',
                url: "/Scripts/knockout-controls/additional/sportType/ko.models.SportTypeViewModel.html"
            }
        ],

    },

    'MainActivityNote': {
        scripts: [
            {
                type: 'ko.mainActivityNote',
                url: "/Scripts/knockout-controls/additional/mainActivityNote/ko.mainActivityNote.js"
            }
        ],
        templates: [
            {
                id: 'ko-mainActivityNote',
                url: "/Scripts/knockout-controls/additional/mainActivityNote/ko.mainActivityNote.template.html"
            }
        ],
        related: ['grid']
    },
    'MainActivityNoteViewModel': {
        scripts: [
            {
                type: 'ko.models.MainActivityNoteViewModel',
                url: "/Scripts/knockout-controls/additional/mainActivityNote/ko.models.MainActivityNoteViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-MainActivityNoteViewModel',
                url: "/Scripts/knockout-controls/additional/mainActivityNote/ko.models.MainActivityNoteViewModel.html"
            }
        ],

    },
    'DispancaryType': {
        scripts: [
            {
                type: 'ko.dispancaryType',
                url: "/Scripts/knockout-controls/additional/dispancaryType/ko.dispancaryType.js"
            }
        ],
        templates: [
            {
                id: 'ko-dispancaryType',
                url: "/Scripts/knockout-controls/additional/dispancaryType/ko.dispancaryType.template.html"
            }
        ],
        related: ['grid']
    },

    'DispancaryCharacter': {
        scripts: [
            {
                type: 'ko.dispancaryCharacter',
                url: "/Scripts/knockout-controls/additional/dispancaryCharacter/ko.dispancaryCharacter.js"
            }
        ],
        templates: [
            {
                id: 'ko-dispancaryCharacter',
                url: "/Scripts/knockout-controls/additional/dispancaryCharacter/ko.dispancaryCharacter.template.html"
            }
        ],
        related: ['grid']
    },
    'DispancaryTypeViewModel': {
        scripts: [
            {
                type: 'ko.models.DispancaryTypeViewModel',
                url: "/Scripts/knockout-controls/additional/dispancaryType/ko.models.DispancaryTypeViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-DispancaryTypeViewModel',
                url: "/Scripts/knockout-controls/additional/dispancaryType/ko.models.DispancaryTypeViewModel.html"
            }
        ],

    },
    'DispancaryCharacterViewModel': {
        scripts: [
            {
                type: 'ko.models.DispancaryCharacterViewModel',
                url: "/Scripts/knockout-controls/additional/dispancaryCharacter/ko.models.DispancaryCharacterViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-DispancaryCharacterViewModel',
                url: "/Scripts/knockout-controls/additional/dispancaryCharacter/ko.models.DispancaryCharacterViewModel.html"
            }
        ],

    },

    'DrugViewModel': {
        scripts: [
            {
                type: 'ko.models.DrugViewModel',
                url: "/Scripts/knockout-controls/Drug/ko.models.DrugViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-DrugViewModel',
                url: "/Scripts/knockout-controls/Drug/ko.models.DrugViewModel.html"
            }
        ],

    },
    'PriceHistoryViewModel': {
        scripts: [
            {
                type: 'ko.models.PriceHistoryViewModel',
                url: "/Scripts/knockout-controls/PriceHistory/ko.models.PriceHistoryViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-PriceHistoryViewModel',
                url: "/Scripts/knockout-controls/PriceHistory/ko.models.PriceHistoryViewModel.html"
            }
        ],
        related: ['cultureService']

    },
    'DiscountViewModel': {
        scripts: [
            {
                type: 'ko.models.DiscountViewModel',
                url: "/Scripts/knockout-controls/Discount/ko.models.DiscountViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-DiscountViewModel',
                url: "/Scripts/knockout-controls/Discount/ko.models.DiscountViewModel.html"
            }
        ],
        related: ['cultureService']

    },
    'ReceptionTypeNameViewModel': {
        scripts: [
            {
                type: 'ko.models.ReceptionTypeNameViewModel',
                url: "/Scripts/knockout-controls/ReceptionTypeName/ko.models.ReceptionTypeNameViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ReceptionTypeNameViewModel',
                url: "/Scripts/knockout-controls/ReceptionTypeName/ko.models.ReceptionTypeNameViewModel.html"
            }
        ],
        related: ['cultureService','select2Manual']

    },
    'DefaultEntityValueViewModel': {
        scripts: [
            {
                type: 'ko.models.DefaultEntityValueViewModel',
                url: "/Scripts/knockout-controls/DefaultEntityValue/ko.models.DefaultEntityValueViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-DefaultEntityValueViewModel',
                url: "/Scripts/knockout-controls/DefaultEntityValue/ko.models.DefaultEntityValueViewModel.html"
            }
        ],
        related: ['diagnose', 'ReceptionCode']

    },
    'AnalysisTemplateSettingViewModel': {
        scripts: [
            {
                type: 'ko.models.AnalysisTemplateSettingViewModel',
                url: "/Scripts/knockout-controls/AnalysisTemplateSetting/ko.models.AnalysisTemplateSettingViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-AnalysisTemplateSettingViewModel',
                url: "/Scripts/knockout-controls/AnalysisTemplateSetting/ko.models.AnalysisTemplateSettingViewModel.html"
            }
        ],
        related: ['select2Manual']

    },
    'ChangeSettingViewModel': {
        scripts: [
            {
                type: 'ko.models.ChangeSettingViewModel',
                url: "/Scripts/knockout-controls/ChangeSetting/ko.models.ChangeSettingViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-ChangeSettingViewModel',
                url: "/Scripts/knockout-controls/ChangeSetting/ko.models.ChangeSettingViewModel.html"
            }
        ],
        related: ['select2Manual']

    },
    'PartnerIncomeViewModel': {
        scripts: [
            {
                type: 'ko.models.PartnerIncomeViewModel',
                url: "/Scripts/knockout-controls/PartnerIncome/ko.models.PartnerIncomeViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-PartnerIncomeViewModel',
                url: "/Scripts/knockout-controls/PartnerIncome/ko.models.PartnerIncomeViewModel.html"
            }
        ],
        related: ['cultureService']

    },
    'PartnerPriceViewModel': {
        scripts: [
            {
                type: 'ko.models.PartnerPriceViewModel',
                url: "/Scripts/knockout-controls/PartnerPrice/ko.models.PartnerPriceViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-PartnerPriceViewModel',
                url: "/Scripts/knockout-controls/PartnerPrice/ko.models.PartnerPriceViewModel.html"
            }
        ],
        related: ['select2Manual']

    },
    'MedServiceUnitViewModel': {
        scripts: [
            {
                type: 'ko.models.MedServiceUnitViewModel',
                url: "/Scripts/knockout-controls/MedServiceUnit/ko.models.MedServiceUnitViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-MedServiceUnitViewModel',
                url: "/Scripts/knockout-controls/MedServiceUnit/ko.models.MedServiceUnitViewModel.html"
            }
        ],
        related: ['cultureService']

    },
    'MedServiceViewModel': {
        scripts: [
            {
                type: 'ko.models.MedServiceViewModel',
                url: "/Scripts/knockout-controls/MedService/ko.models.MedServiceViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-MedServiceViewModel',
                url: "/Scripts/knockout-controls/MedService/ko.models.MedServiceViewModel.html"
            }
        ],
        related: ['cultureService', 'select2Manual']

    },
    'PartnerViewModel': {
        scripts: [
            {
                type: 'ko.models.PartnerViewModel',
                url: "/Scripts/knockout-controls/Partner/ko.models.PartnerViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-PartnerViewModel',
                url: "/Scripts/knockout-controls/Partner/ko.models.PartnerViewModel.html"
            }
        ],
        related: ['select2Manual']

    },
    'PackageInMedServiceViewModel': {
        scripts: [
            {
                type: 'ko.models.PackageInMedServiceViewModel',
                url: "/Scripts/knockout-controls/MedServicePackage/ko.models.PackageInMedServiceViewModel.js"
            }
        ],
        related: ['MedServiceViewModel']

    },
       'MedServicePackageViewModel': {
        scripts: [
            {
                type: 'ko.models.MedServicePackageViewModel',
                url: "/Scripts/knockout-controls/MedServicePackage/ko.models.MedServicePackageViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-MedServicePackageViewModel',
                url: "/Scripts/knockout-controls/MedServicePackage/ko.models.MedServicePackageViewModel.html"
            }
        ],
        related: ['cultureService', 'PackageInMedServiceViewModel']

    },
    'SocialCategory': {
        scripts: [
            {
                type: 'ko.socialCategory',
                url: "/Scripts/knockout-controls/additional/socialCategory/ko.socialCategory.js"
            }
        ],
        templates: [
            {
                id: 'ko-socialCategory',
                url: "/Scripts/knockout-controls/additional/socialCategory/ko.socialCategory.template.html"
            }
        ],
        related: ['grid']
    },

    'SocialCategoryViewModel': {
        scripts: [
            {
                type: 'ko.models.SocialCategoryViewModel',
                url: "/Scripts/knockout-controls/additional/socialCategory/ko.models.SocialCategoryViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-SocialCategoryViewModel',
                url: "/Scripts/knockout-controls/additional/socialCategory/ko.models.SocialCategoryViewModel.html"
            }
        ],

    },
    'SocialCategoryGroup': {
        scripts: [
            {
                type: 'ko.socialCategoryGroup',
                url: "/Scripts/knockout-controls/additional/socialCategoryGroup/ko.socialCategoryGroup.js"
            }
        ],
        templates: [
            {
                id: 'ko-socialCategoryGroup',
                url: "/Scripts/knockout-controls/additional/socialCategoryGroup/ko.socialCategoryGroup.template.html"
            }
        ],
        related: ['grid']
    },

    'SocialCategoryGroupViewModel': {
        scripts: [
            {
                type: 'ko.models.SocialCategoryGroupViewModel',
                url: "/Scripts/knockout-controls/additional/socialCategoryGroup/ko.models.SocialCategoryGroupViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-SocialCategoryGroupViewModel',
                url: "/Scripts/knockout-controls/additional/socialCategoryGroup/ko.models.SocialCategoryGroupViewModel.html"
            }
        ],

    },
    /*=================================*/
    'FacilityCategory': {
        scripts: [
            {
                type: 'ko.facilityCategory',
                url: "/Scripts/knockout-controls/additional/facilityCategory/ko.facilityCategory.js"
            }
        ],
        templates: [
            {
                id: 'ko-facilityCategory',
                url: "/Scripts/knockout-controls/additional/facilityCategory/ko.facilityCategory.template.html"
            }
        ],
        related: ['grid']
    },

    'FacilityCategoryViewModel': {
        scripts: [
            {
                type: 'ko.models.FacilityCategoryViewModel',
                url: "/Scripts/knockout-controls/additional/facilityCategory/ko.models.FacilityCategoryViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-FacilityCategoryViewModel',
                url: "/Scripts/knockout-controls/additional/facilityCategory/ko.models.FacilityCategoryViewModel.html"
            }
        ],

    },
    'FacilityCategoryGroup': {
        scripts: [
            {
                type: 'ko.facilityCategoryGroup',
                url: "/Scripts/knockout-controls/additional/facilityCategoryGroup/ko.facilityCategoryGroup.js"
            }
        ],
        templates: [
            {
                id: 'ko-facilityCategoryGroup',
                url: "/Scripts/knockout-controls/additional/facilityCategoryGroup/ko.FacilityCategoryGroup.template.html"
            }
        ],
        related: ['grid']
    },

    'FacilityCategoryGroupViewModel': {
        scripts: [
            {
                type: 'ko.models.FacilityCategoryGroupViewModel',
                url: "/Scripts/knockout-controls/additional/facilityCategoryGroup/ko.models.FacilityCategoryGroupViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-FacilityCategoryGroupViewModel',
                url: "/Scripts/knockout-controls/additional/facilityCategoryGroup/ko.models.FacilityCategoryGroupViewModel.html"
            }
        ],

    },
    'HumanOrganViewModel': {
        scripts: [
            {
                type: 'ko.models.HumanOrganViewModel',
                url: "/Scripts/knockout-controls/humanOrgan/ko.models.HumanOrganViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-HumanOrganViewModel',
                url: "/Scripts/knockout-controls/humanOrgan/ko.models.HumanOrganViewModel.html"
            }
        ],
    },
    'CharacterFeedViewModel': {
        scripts: [
            {
                type: 'ko.models.CharacterFeedViewModel',
                url: "/Scripts/knockout-controls/CharacterFeed/ko.models.CharacterFeedViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-CharacterFeedViewModel',
                url: "/Scripts/knockout-controls/CharacterFeed/ko.models.CharacterFeedViewModel.html"
            }
        ],
        related: ['select2Manual']
    },
    'PreventionRicketViewModel': {
        scripts: [
            {
                type: 'ko.models.PreventionRicketViewModel',
                url: "/Scripts/knockout-controls/PreventionRicket/ko.models.PreventionRicketViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-PreventionRicketViewModel',
                url: "/Scripts/knockout-controls/PreventionRicket/ko.models.PreventionRicketViewModel.html"
            }
        ],
        related: ['select2Manual']
    },
    'MedicalCardViewModel': {
        scripts: [
            {
                type: 'ko.models.MedicalCardViewModel',
                url: "/Scripts/knockout-controls/MedicalCard/ko.models.MedicalCardViewModel.js"
            },
        ],
        templates: [
            {
                id: 'ko-models-MedicalCardViewModel',
                url: "/Scripts/knockout-controls/MedicalCard/ko.models.MedicalCardViewModel.html"
            },
            {
                id: 'ko-models-PatientInfoViewModel',
                url: "/Scripts/knockout-controls/Patient/ko.models.PatientInfoViewModel.html"
            }
        ],

       
    },
    'EducationalReceptionViewModel': {
        scripts: [
            {
                type: 'ko.models.EducationalReceptionViewModel',
                url: "/Scripts/knockout-controls/EducationalReception/ko.models.EducationalReceptionViewModel.js"
            }
        ],
        templates: [
            {
                id: 'ko-models-EducationalReceptionViewModel',
                url: "/Scripts/knockout-controls/EducationalReception/ko.models.EducationalReceptionViewModel.html"
            },
            {
                id: 'ko-models-EducationalAppointmentViewModel',
                url: "/Scripts/knockout-controls/EducationalReception/ko.models.EducationalAppointmentViewModel.html"
            },
             {
                 id: 'ko-models-AbsenteeismViewModel',
                 url: "/Scripts/knockout-controls/EducationalReception/ko.models.AbsenteeismViewModel.html"
             },
              {
                  id: 'ko-models-InvestigationViewModel',
                  url: "/Scripts/knockout-controls/EducationalReception/ko.models.InvestigationViewModel.html"
              },
        ],
        related: ['ReceptionCode','diagnose','drug','select2Manual']
    },
    'educationalReceptionGrid': {
        scripts: [
            {
                type: 'ko.educationalReceptionGrid',
                url: "/Scripts/knockout-controls/EducationalReception/ko.educationalReceptionGrid.js"
            },

        ],
        templates: [
            {
                id: 'ko-EducationalReceptionGrid',
                url: "/Scripts/knockout-controls/EducationalReception/ko.educationalReceptionGrid.html"
            }
           ],
        related: ['EducationalReceptionViewModel']
    },
    'drug': {
        scripts: [
            {
                type: 'ko.drug',
                url: "/Scripts/knockout-controls/drug/ko.drug.js"
            }
        ],
        templates: [
            {
                id: 'ko-drug',
                url: "/Scripts/knockout-controls/drug/ko.drug.html"
            }
        ],
        related: ['grid']
    },
};