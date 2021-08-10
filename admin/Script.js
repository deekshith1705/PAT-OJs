var app = angular.module("myModule", [])
        .controller("myController", function ($scope) {

            var employees = [
                {
                    name: "Ben", branch:"cse",
                    year: 2021,h: 5000,ch:2300,cf:3300,t:10600
                },
                {
                   name: "abc", branch:"cse",
                    year: 2022,h: 6000,ch:4500,cf:2100,t:12600
                },
                {
                   name: "tom", branch:"eee",
                    year: 2020,h: 4000,ch:2800,cf:3100,t:9900
                },
                {
                    name: "xyz", branch:"ece",
                    year: 2022,h: 4500,ch:3400,cf:2300,t:10200
                },
                {
                    name: "pql", branch:"it",
                    year: 2021,h: 5800,ch:4100,cf:1300,t:11200
                }
            ];

            $scope.employees = employees;
            $scope.sortColumn = "name";
            $scope.reverseSort = false;

            $scope.sortData = function (column) {
                $scope.reverseSort = ($scope.sortColumn == column) ?
                    !$scope.reverseSort : false;
                $scope.sortColumn = column;
            }

            $scope.getSortClass = function (column) {

                if ($scope.sortColumn == column) {
                    return $scope.reverseSort
                      ? 'arrow-down'
                      : 'arrow-up';
                }

                return '';
            }
        });