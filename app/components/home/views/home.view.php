<div flex layout="row">
  <md-card flex="100">
    <div layout="row" flex layout-margin>
      <div flex="20" layout="column">
        <md-input-container flex>
          <label><i class="material-icons">search</i> Search</label>
          <input name="searchText" ng-model="homeCtrl.searchText">
        </md-input-container>
      </div>
      <div flex></div>
      <div ng-if="!homeCtrl.currentUserUsername" flex="25">
        <div layout="row" flex>
          <form name="userNameForm">
          <md-input-container flex>
            <label><i class="material-icons">person</i></label>
            <input name="userName" ng-model="homeCtrl.tempUserName" minLength="5">
            <div ng-messages="userNameForm.userName.$error" ng-show="userNameForm.userName.$dirty">
              <div ng-message="minlength">That's too short!</div>
            </div>
            <div ng-message="minLength">To short</div>
          </md-input-container>
          <div type="submit" class="button" ng-click="homeCtrl.saveUserName(homeCtrl.tempUserName)"> Submit name </div>
        </form>
        </div>
      </div>
      <div ng-if="homeCtrl.currentUserUsername" flex="25">
        <div layout="row" flex>
          <i class="material-icons">person</i>{{homeCtrl.currentUserUsername}}
        </div>
      </div>

  </div>
  </md-card>
</div>
<div flex layout="row" layout-wrap>
  <div ng-repeat="idea in homeCtrl.ideasData | filter:homeCtrl.searchText" flex="25">
    <md-card>
      <img ng-src="assets/img/idea-image/min/{{idea.image_url}}" class="md-card-image" alt="Washed Out">
      <md-card-title >
        {{idea.title}}
      </md-card-title>
      <md-card-content>
        {{idea.description}}
      </md-card-content>
      <md-card-actions layout="row" layout-align="end center">
        <div flex class="idea-likes" > {{idea.number_of_likes}}</div>
        <md-button ng-click="homeCtrl.changeVote(idea)" >hallo</md-button>
      </md-card-actions>
    </md-card>
  </div>

</div>
