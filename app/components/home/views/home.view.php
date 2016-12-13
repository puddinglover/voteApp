<div flex layout="row">
  <md-card ng-repeat="idea in homeCtrl.ideasData" flex="25">
    <md-card-title >
    {{idea.title}}
  </md-card-title>
  <md-card-content>
    {{idea.description}}
  </md-card-content>
  <md-card-actions layout="row" layout-align="end center">
    <md-button> Læs Mere </md-button>
  </md-card-actions>
  </div>

</div>
