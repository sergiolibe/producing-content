# EventBridge (AWS)
### [🔙 back to index](../README.md)

_TODO: remove this line v
---brief short description before cleaning---

Every service in AWS generates an event whenever something happens (actions, state changes, writes, etc).

An event bus is a mechanism that deliver events to zero or more targets (destinations). Each AWS account has a default event bus.

An Rule is a specification in which you can define what `kind` of event the event bus should send to `which` targets.

A target is a valid destination, resource, or endpoint to which Event Bridge will deliver the marching event. You can define up to five targets for each rule. Examples of targets are: API Gateway, AWS AppSync, AWS Lambda.

By default, an AWS account wont deliver events from `X` servce to `Z` service, even tho the default Event Bus is configured from the beginning. In order for this to hapen, you have to define a Rule, that matches `certain` events from service `X`, and set a mechanism of which it reaches service `Z` in the way you want or need; in some cases a direct target might be what you need, in other cases you might need a middle man like a Step Function or a Lambda.

## What is/does?

## What problem solves?

## Pros/Cons

## Is it worth using? If so, what scenario
