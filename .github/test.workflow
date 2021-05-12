workflow "run tests" {
  resolves = ["test"]
  on = "push"
}

action "composer install" {
  uses = "hermajan/sandbox@master"
  runs = "composer install --no-interaction --prefer-source"
}

action "test" {
  uses = "hermajan/sandbox@master"
  needs = ["composer install"]
  runs = "bash bin/tests.sh"
}
