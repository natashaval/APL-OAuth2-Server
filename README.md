# APL-Exam

Description:
- An administator can manage group and user (users-groups = N-N)
- An administrator manage modules, subjects,
questions, answers, tests

Api link: http://localhost/apl/APL-OAuth2-Server/src/:moduleName/api/:controller/:action/:param

## Groups (DONE)
- getAll
- getById
- createGroup
- updateGroup

## Users (DONE, except delete)
- getAll
- getById (mapping to App UserModel)
- createUser
- deleteUser (safe delete)
- generateQR (library)

## Modules (DONE)
- getAll
- getById
- createModule
- deleteById (check if belong to subjects)

## Subjects (DONE)
- getAll (array of Subject objects + module object)
- getById (Subject object + module object)
- createSubject
- updateSubject

## Questions
- getAll (array of Question objects + subject object)
- getById (Question object + subject object)
- createQuestion

## Answers
- getAll (array of Answer objects + question object)
- getById (Answer object + question object)
- createAnswer
- updateAnswer
- deleteById

## Tests
- getAll
- getById
- list (only name, description, begin&end time)
- createTest
- assignTestToGroups
- assignTestToSubjects