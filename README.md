# APL-Exam

Description:
- An administator can manage group and user (users-groups = N-N)
- An administrator manage modules, subjects,
questions, answers, tests

## Groups
- getAll
- getById
- createGroup
- updateGroup

## Users
- getAll
- getById (mapping to App UserModel)
- createUser
- deleteUser (safe delete)

## Modules
- getAll
- getById
- createModule
- deleteById (check if belong to subjects)

## Subjects
- getAll (array of Subject objects + module object)
- getById (Subject object + module object)
- createSubject
- updateSubject

## Questions

## Answers
