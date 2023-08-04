# reservationsysOOP

**Front Controller**->Forwards request to->

**Controller or Action**->Performs tasks by calling->**App Service**

**Controller or Action**->Displays information from->**Read model**->Is Managed by->Read model Repository && Is based on Entity or Write model->is Managed by->Write Model Repository

**App Service**->Gets extra information from/Makes decisions based on->**Read model**

**App Service**->Creates or modifies->**Entity or Write Model**

**App Service**->Dispatches zero or more->**Domain event**

**Entity**->Records zero or more->**Domain event**

**Event subscriber**->listens to->**Domain event**


Services in controllers

Database queries in repositories

Repositories in services

Common, abstract code in abstract/base class

Models in services

Other Dependencies in services (3rd-party API)

Interface inversion dependency

Implementation of interface in core model/repository itself ?