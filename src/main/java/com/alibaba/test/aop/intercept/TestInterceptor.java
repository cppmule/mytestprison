package com.alibaba.test.aop.intercept;

import org.aopalliance.intercept.MethodInterceptor;
import org.aopalliance.intercept.MethodInvocation;

public class TestInterceptor implements MethodInterceptor {
	public Object invoke(MethodInvocation arg0) throws Throwable {
		if (arg0.getMethod().getName().equals("process")) {
			Object[] args = arg0.getArguments();// 被拦截的参数
			if (null != args && args.length > 0) {
				System.out.println("===== TestInterceptor");
				arg0.getArguments()[0] = "假做真时真亦假";// 修改被拦截的参数
			}
		}
		return arg0.proceed();
	}
}
