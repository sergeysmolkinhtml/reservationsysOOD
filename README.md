# System

**Front Controller**->Forwards request to->

**Controller or Action**->Performs tasks by calling->**App Service**

**Controller or Action**->Displays information from->**Read model**->Is Managed by->Read model Repository && Is based on Entity or Write model->is Managed by->Write Model Repository

**App Service**->Gets extra information from/Makes decisions based on->**Read model**

**App Service**->Creates or modifies->**Entity or Write Model**

**App Service**->Dispatches zero or more->**Domain event**

**Entity**->Records zero or more->**Domain event**

**Event subscriber**->listens to->**Domain event**


## Controllers
1. Could be index.php file.
2. Typically, have code that reveals where the call came from.
3. Should be considered infrastructure code.
4. Calls either an application service or a RMR(read model repository)
5. Could be final, extend abstract controller 


## Application Service 
1. Called in Controllers.
2. Represents the task to be performed.
3. Will be called when the controller is supposed to produce some kind of effect: app state,send out email etc
4. The web controller will take the data from the request (via a form), and provide it to the application service.
5. It gets any dependency injected ad constructor arguments.
6. All the relevant data that's needed to perform the task (including contextual information) will be provided as method arguments.
7. The code should read like a recipe, with all steps required to do the job.
8. Instead of invoking an application service using primitive-type arguments, you can also call it by providing <!-- TOC --> *[DTO](#dto)<!-- TOC -->. 
9. For IE Receives primitive-type arguments->converts to value objects->instantiates new Entity using these VOs



## DTO
1. Represents the client's request in a single object.
2. Carry the data provided by the client and transfer it as one thing from controller to application service.
3. This should be a simple, easy-to-construct object and should contain only primitive-type values, simple lists, 
4. Optionally other DTOs if some sort of hierarchy is required.


## Write model repositories
1. Domain object has to be modified and persisted. The app service uses an abstraction for this: a repository.
2. Concerned with retrieving an entity and storing the changes that are made to it.
3. The abstraction itself will be an interface that the application service gets injected as a dependency.
4. Interface just offers some general-purpose methods: getById(), save(), add().
5. Implementation will fill in the details (SQL Queries, ORM will be used to map the object to a row in the DB).
6. Could be final, implements interface, injects entityManager

Services in controllers

Database queries in repositories

Repositories in services

Common, abstract code in abstract/base class

Models in services

Other Dependencies in services (3rd-party API)

Interface inversion dependency

Implementation of interface in core model/repository itself ?