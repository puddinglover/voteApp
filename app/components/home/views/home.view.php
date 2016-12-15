<div flex layout="row">
  <md-card flex="100">
    <div layout="row" flex layout-margin layout-wrap>
      <div flex="20" flex-sm="35" flex-xs="100" layout="column">
        <md-input-container flex>
          <label><i class="material-icons">search</i> Search</label>
          <input name="searchText" ng-model="homeCtrl.searchText">
        </md-input-container>
      </div>
      <div flex></div>
      <div ng-if="!homeCtrl.currentUserUsername" flex="25" flex-sm="50" flex-xs="100" layout="row" layout-align="end end" flex-xs="100" layout-align-xs="start start">
          <form name="userNameForm">
          <md-input-container flex>
            <label><i class="material-icons">person</i></label>
            <input name="userName" ng-model="homeCtrl.tempUserName" minLength="5">
            <div ng-messages="userNameForm.userName.$error" ng-show="userNameForm.userName.$dirty">
              <div ng-message="minlength">That's too short!</div>
            </div>
            <div ng-message="minLength">To short</div>
          </md-input-container>
          <div type="submit" class="button" ng-click="homeCtrl.saveUserName(homeCtrl.tempUserName)"> Submit <span hide-sm hide-xs>name</span> </div>
        </form>
      </div>
      <div ng-if="homeCtrl.currentUserUsername" flex="25" flex-sm="35" layout="row" layout-align="end end" flex-xs="100" layout-align-xs="start start">
        <div>
          <div layout="row" flex>
            <i class="material-icons">person</i>{{homeCtrl.currentUserUsername}}
          </div>
        </div>
      </div>
  </div>
  </md-card>
</div>
<div flex layout="row" layout-wrap>
  <div ng-repeat="idea in homeCtrl.ideasData | filter:homeCtrl.searchText" flex="25" flex-sm="50" flex-xs="100">
    <md-card>
      <img ng-src="assets/img/idea-image/min/{{idea.image_url}}" class="md-card-image" alt="Washed Out">
      <md-card-title >
        {{idea.title}}
      </md-card-title>
      <md-card-content>
        {{idea.description}}
        <div class="category-holder" layout="row" >
          <div class="category" ng-repeat="category in idea.category">
            {{category.name}}
          </div>
        </div>
      </md-card-content>
      <md-card-actions layout="row" layout-align="end center">
        <div flex class="idea-likes" > {{idea.number_of_likes}}</div>
        <a class="like-button" ng-click="homeCtrl.changeVote(idea)" >
          <i ng-if="!idea.userLikes" class="material-icons" >favorite_border</i>
          <i ng-if="idea.userLikes" class="material-icons" >favorite</i>
        </a>
      </md-card-actions>
    </md-card>
  </div>

</div>
